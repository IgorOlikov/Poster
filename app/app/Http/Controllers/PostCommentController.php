<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Post $post)
    {
        if (!Auth::check())
        {
            return redirect('/login');
        }

        return view('post-comments.create_post_comment',compact('post'));

    }

    public function create_children(Post $post, Comment $comment)
    {
        if (!Auth::check())
        {
            return redirect('/login');
        }

        return view('post-comments.create_children_comment',compact('post','comment'));
    }

    public function store(StoreCommentRequest $request,Post $post,Comment $comment)
    {
        $attributes = $request->validated();

        $childrenComment = ['comment'=> $attributes['comment'],'post_id' =>$post->id,'user_id' => Auth::user()->id,'parent_id' => $comment->id];
        Comment::create($childrenComment);

        return redirect("/posts/$post->id");
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Post $post,Comment $comment)
    {
        return view('post-comments.edit',compact('post','comment'));
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
