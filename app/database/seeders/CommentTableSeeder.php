<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    public function run(): void
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

        //dd($comments_keys);

        $collectc = collect(Comment::all());

        $collectcmk = collect(Comment::all())->keys();

        //
        $userid_arr= [];

        foreach ($collectcmk as $item) {
            $userid_arr[$item]['user_id'] = $comments_keys[$item];
        }

        foreach ($userid_arr as $item => $value) {
            $id = $item + 1; // 1...10000
            Comment::where('id','=',$id)
                ->update($userid_arr[$item]);
        }
    }
}
