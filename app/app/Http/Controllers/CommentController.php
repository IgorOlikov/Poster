<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
       $comments = Comment::all()->take(30);

        return view('comments.index',compact('comments'));
    }

    public function create()
    {
        return view('comments.create');
    }

    public function store(StoreCommentRequest $request, Post $post)
    {
        $post->comments()->create([
          'comment' => $request->validated('comment'),
           'post_id' => $post->id,
           'user_id' => $request->user()->id,
        ]);

        return redirect()->route('posts.show',$post->id);
    }

    public function show(Comment $comment)
    {
        return view('comments.show',compact('comment'));
    }

    public function edit(Comment $comment)
    {
        return view('comments.edit',compact('comment'));
    }

    public function update(Request $request,Comment $comment)
    {
        $attributes = $request->validate([
           'comment' => ['required','string','max:255'],
        ]);
        $comment->update($attributes);

        return redirect("posts/$comment->post_id");
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect("posts/$comment->post_id");
    }
}
