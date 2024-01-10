<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function index()
    {
       $posts = Post::all()->sortBy('id', SORT_NATURAL ,true)->take(6);

        return view('posts.index',compact('posts'));
    }

    public function create()
    {
        if (!Auth::check()){
            return redirect('/login');
        }
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'body' => ['required'],
            'image' => ['nullable'],
        ]);
        $attributes = array_merge($attributes,['user_id' => $request->user()['id']]);

       $post = Post::create($attributes);

        return redirect("/posts/$post->id");
    }

    public function show(Post $post)
    {
        $comments = $post->load(
            ['comments' => function($query){
                $query->whereNull('parent_id');
            }]);
           $comments = $comments['comments'];

           //base comments(without parent_id) -> load recursive relationships
          $comments = $comments->load('comment_owner','child_comments.comment_owner','parent_comment.comment_owner');

          $post->load('owner');

        return view('posts.show',compact('post','comments'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $attributes = $request->validate([
            'title' => ['required'],
            'body' => ['required'],
            'image' => ['nullable'],
        ]);
        $attributes = array_merge($attributes,['user_id' => $post->user_id]);

        $post->update($attributes);

        return redirect("/posts/$post->id");
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts');
    }
}
