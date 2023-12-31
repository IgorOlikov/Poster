<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{

    public function index(Request $request)
    {
        $users = collect(User::all()->modelKeys());
        $posts = collect(Post::all()->modelKeys());
        $comment_count = Comment::count();
        $user_count = User::count();
        $comments = Comment::all()->sortBy('id');

        $comments = $comments->toArray();

        //dd($comments);//92 => array:10 [▶]
                        //30 => array:10 [▶]
                        //31 => array:10 [▶]
                        //0 => array:10 [▶]
                        //1 => array:10 [▶]

        foreach ($comments as $comment) {
            //$post_id  = $posts[$i]['id'];
            $post_id = $comment['post_id'];
            $parent_id = $comment['id'];
            for ($z = 0;$z < $user_count;$z++) { // 10 users write 10 comments for 1 existing comment
                $data[] = [
                    'post_id' => $post_id, // [4,6,9]
                    'parent_id' => $parent_id, //where
                    'user_id' => $users->random(), // ?
                    'comment' => fake()->text,
                ];
                dd($data);
               // foreach ($data as $parent_comment) {
               //     Comment::insert($parent_comment);
               // }
            }
            exit();
        }
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
