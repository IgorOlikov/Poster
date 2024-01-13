<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests\StorePostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Services\UploadPostImageService;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function index()
    {
       $posts = Post::orderBy('id','desc')->paginate(6);

        return view('posts.index',compact('posts'));
    }

    public function create(Request $request)
    {


        $user = $request->user();

        return view('posts.create',compact('user'));
    }
    public function store(StorePostRequest $request)
    {
        $imagePath = (New UploadPostImageService())->storePostImage($request->validated('image'));

        $post = Post::create([
            'post_image' => $imagePath,
            'user_id' => $request->user()->id,
           'title' => $request->validated('title'),
           'body' => $request->validated('body'),
        ]);

        return redirect()->route('posts.show',$post->id);
    }

    public function show(Post $post)
    {
          $post->load('owner');

            $comments = Comment::where('post_id',$post->id)
               ->with(['comment_owner','child_comments.comment_owner','parent_comment.comment_owner'])
               ->whereNull('parent_id')->paginate(2);

        return view('posts.show',compact('post','comments'));
    }

    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $postFields = $request->validated();

        $post->update($postFields);

        return redirect()->route('posts.show',$post);
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts');
    }
}
