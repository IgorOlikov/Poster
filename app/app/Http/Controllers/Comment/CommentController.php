<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CommentStoreRequest;
use App\Http\Requests\Comment\CommentUpdateRequest;
use App\Jobs\CommentReplyNotificationJob;
use App\Mail\CommentReplied;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class CommentController extends Controller
{
    public function index()
    {
       $comments = Comment::all()->take(30);

        return view('comments.index',compact('comments'));
    }

    public function create(Post $post)
    {
        return view('post-comments.create_post_comment',compact('post'));
    }

    public function create_children(Post $post, Comment $comment)
    {
        return view('post-comments.create_children_comment',compact('post','comment'));
    }

    public function store_children(CommentStoreRequest $request, Post $post, Comment $comment)
    {
        dispatch(new CommentReplyNotificationJob($request->user(),$comment));

        $comment->child_comments()->create([
            'comment' =>  $request->validated('comment'),
            'post_id' => $comment->post_id,
            'user_id' => $request->user()->id,
        ]);
        return redirect()->route('posts.show',$post->id);
    }

    public function store(CommentStoreRequest $request, Post $post)
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

    public function edit(Post $post,Comment $comment)
    {
        return view('post-comments.edit',compact('post','comment'));
    }

    public function update(CommentUpdateRequest $request,Comment $comment)
    {
        $comment->update($request->validated());

        return redirect()->route('posts.show',$comment->post_id);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('posts.show',$comment->post_id);
    }
}
