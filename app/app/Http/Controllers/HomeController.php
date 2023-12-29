<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

     // $comment = collect(Comment::all());
     // $post_id = collect(Post::all()->modelKeys());
     // //dd($comment);
     // $ppp = $post_id->random(); // [4,6,9]
     // $ccc = $comment->where('post_id','=',$ppp)->value('post_id');
     // dd($ppp,$ccc);
        $collectz = User::factory(10)
            ->has(Post::factory()
                ->has(Comment::factory(10)->state(function (array $attributes, Post $post){
                    return ['user_id' => $post->id];
                })))->make();

            dd($collectz);
        // ПОХУЙ


   }



    /**
     * Show the form for creating a new resource.
     */
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
