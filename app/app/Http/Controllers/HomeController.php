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

        $comments_size = Comment::count();

        for ($i = 0;$i < $comments_size;$i++) {
            $user_id = array_merge($user_id,$user_id);

            if (count($user_id) > $comments_size){
                break;
            }
        }
        //$user_id = $user_id->take($comments_size);

        $user_id = array_slice($user_id,0, $comments_size);

        $comment_keys = Comment::all()->keys()->toArray();


        //$fak = gettype($comment_keys);
        //dd($fak);


        $user_id_arr = [];

        foreach ($comment_keys as $key) {
            $user_id_arr[$key]['user_id'] = $user_id[$key];
        }
        unset($user_id);

            //dd($user_id_arr); [0] = 1

        dump(Comment::where('id','=',1)->first());
        dump(Comment::all()->first());
        for ($z = 1,$i = 0;$i < $comments_size;$i++,$z++){
            Comment::where('id','=',$z)
                ->update(['user_id' => $user_id_arr[$i]['user_id']]);
           // dump("where id =$z ['user_id'] =>" .$user_id_arr[$i]['user_id'] . PHP_EOL);
           // dump(Comment::where('id','=',$z)->first());
        }
        //dump(Comment::where('id','=',1)->first());
        dd(...Comment::all()->sortKeys());
        dd(...Comment::all());
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
