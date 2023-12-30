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

        $comments_keys = collect(Comment::all()->modelKeys());

        $comments_size = Comment::count();
        $users_size = User::count();

        $trash = $comments_keys->splice($users_size);

       for ($i = 0;$i < $comments_size;$i++) {
           $comments_keys = $comments_keys->concat($comments_keys);
           if ($comments_keys->count() > $comments_size){
               break;
           }
       }
       $comments_keys = $comments_keys->take($comments_size);

        $collectc = collect(Comment::all());


        $collectcmk = collect(Comment::all())->keys();

            foreach ($collectcmk as $item) {
                $collectc[$item]['user_id'] = $comments_keys[$item];
            }

        $fields = $collectc->toArray();

        foreach ($collectc as $total_comments){
            Comment::upsert($fields,'id',['user_id']);
        }

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
