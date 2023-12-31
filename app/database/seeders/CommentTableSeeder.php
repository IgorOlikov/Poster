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
        unset($trash);
        for ($i = 0;$i < $comments_size;$i++) {
            $comments_keys = $comments_keys->concat($comments_keys);
            if ($comments_keys->count() > $comments_size){
                break;
            }
        }
        $comments_keys = $comments_keys->take($comments_size);

        $collectcmk = collect(Comment::all())->keys();

        $user_id_arr = [];

        foreach ($collectcmk as $item) {
            $user_id_arr[$item]['user_id'] = $comments_keys[$item];
        }
        unset($comments_keys);


        for ($z = 1,$i = 0;$i < $comments_size;$i++,$z++){
            Comment::where('id','=',$z)
                ->update($user_id_arr[$i]);
        }

    }
}
