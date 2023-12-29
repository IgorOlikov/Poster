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

        $comments_keys = collect(Comment::all()->modelKeys());

        $comments_size = Comment::count();
        $users_size = User::count();


        //dd($user_size);
        //dd($comments_keys);  //COLLAPSE

        $trash = $comments_keys->splice($users_size);



       for ($i = 0;$i < $users_size;$i++) {
           $comments_keys = $comments_keys->concat($comments_keys);
           if ($comments_keys->count() > $comments_size){
               break;
           }
       }
       $comments_keys = $comments_keys->take($comments_size);
        dd($comments_keys->all());




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
