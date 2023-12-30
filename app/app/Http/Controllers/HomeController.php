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

        $trash = $comments_keys->splice($users_size);

       for ($i = 0;$i < $comments_size;$i++) {
           $comments_keys = $comments_keys->concat($comments_keys);
           if ($comments_keys->count() > $comments_size){
               break;
           }
       }
       $comments_keys = $comments_keys->take($comments_size);

        $collectc = collect(Comment::all());
        $collectm = collect(Comment::all()->modelKeys());
        $collectm = $collectm->keys();

            foreach ($collectm as $item) {
                $collectc[$item]['user_id'] = $comments_keys[$item];
            }
            //dd($collectc[99]);
            $fields = $collectc->toArray();
            dd($fields);
            foreach ($collectc as $total_comments){
                Comment::insert($fields);
            }


       //dd($comments_keys);
      // foreach ($comments_keys as $comments_key) {
      //  $wz =  Comment::where('id','!=',9999999)
      //         ->update(['user_id' => $comments_key]);
      //     print $comments_key;
      //     // each()->update
      // }

      // dd($wz);


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
