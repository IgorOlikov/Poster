<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

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

    public function store(StoreCommentRequest $request,Post $post)
    {
        //dd($request);
        $attributes = $request->validated();
        Comment::create($attributes);

        return redirect("/posts/$post->id");
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
       // $comment->child_comments()->delete();

        $comment->delete();

        return redirect("posts/$comment->post_id");
    }
}
