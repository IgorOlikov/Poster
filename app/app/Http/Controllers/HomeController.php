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
        $user_id = User::all()->modelKeys();
        $id = Comment::all()->modelKeys();

        $comments_size = Comment::count();

        for ($i = 0;$i < $comments_size;$i++) {
            $user_id = array_merge($user_id,$user_id);
            if (count($user_id) > $comments_size){
                break;
            }
        }
        $user_id = array_slice($user_id,0, $comments_size);

        $comment_keys = Comment::all()->keys()->toArray();

        foreach ($comment_keys as $key) {
            $rows[] = [
                'id' => $id[$key],
                'user_id' => $user_id[$key],
            ];
        }
        unset($user_id);

        foreach ($rows as $row){
            Comment::where('id',$row['id'])
                ->update(['user_id' => $row['user_id']]);
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
