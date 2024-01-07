<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

    public function store(Request $request)
    {
        dd($request);
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
