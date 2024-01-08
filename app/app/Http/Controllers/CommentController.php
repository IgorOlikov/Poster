<?php

namespace App\Http\Controllers;

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

    public function store(Request $request,Post $post)
    {
        $attributes = $request->validate([
           'parent_id' => ['nullable','int','exists:comments,id'],
            'post_id' => ['required','int','exists:posts,id'],
            'user_id' => ['required', 'int', 'exists:users,id'],
            'comment' => ['required','string','max:255']
        ]);



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

    public function update(Request $request, Comment $comment)
    {
        dd($request);
    }

    public function destroy(Comment $comment)
    {
        dd($comment);
    }
}
