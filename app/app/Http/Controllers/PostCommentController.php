<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Comment;

class PostCommentController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Post $post)
    {
        return view('post-comments.create_post_comment',compact('post'));

    }

    public function create_children(Post $post, Comment $comment)
    {
        //dd($post,$comment);

        return view('post-comments.create_children_comment',compact('post','comment'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Post $post,Comment $comment)
    {
        //dd($post,$comment);

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
