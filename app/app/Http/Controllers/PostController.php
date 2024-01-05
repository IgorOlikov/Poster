<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
       $posts = Post::all()->sortBy('id', SORT_NATURAL ,true)->take(5);

        return view('posts.index',compact('posts'));
    }

    public function create()
    {
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
       // dd($post);

        //$comments = $post->with('childrenComments')->first();
       // $comments = $post->load('childrenComments')->whereNull('parent_id');
            //->where('parent_id',null);

         //$comments  = $post->load('comments')->whereNull('parent_id');
      // $comments = $post->load(
      //     ['comments' => function( $query){
      //     $query->whereNull('parent_id');
      // }]);

        $comments = $post->load(
            ['childrenComments' => function($query){
                $query->whereNull('parent_id');
            }]);


        $comments = $comments['childrenComments'];
      // $comments  = $post->load('comments')->getQuery()->get();

       //dd($comments);
       // dd(...$comments['childrenComments']);
       // dd(...$comments['childrenComments']);


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
