<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentUserIdFixer extends Seeder
{
    public function run(): void
    {
        $user_id = collect(User::all()->modelKeys());

        $comments_size = Comment::count();

        for ($i = 0;$i < $comments_size;$i++) {
            $user_id = $user_id->concat($user_id);
            if ($user_id->count() > $comments_size){
                break;
            }
        }
        $user_id = $user_id->take($comments_size);

        $comment_keys = Comment::all()->keys();

        $user_id_arr = [];

        foreach ($comment_keys as $key) {
            $user_id_arr[$key]['user_id'] = $user_id[$key];
        }
        unset($user_id);



        for ($z = 1,$i = 0;$i < $comments_size;$i++,$z++){
            Comment::where('id','=',$z)
                ->update(['user_id' => $user_id_arr[$i]['user_id']]);
            dump("where id =$z ['user_id'] =>" .$user_id_arr[$i]['user_id'] . PHP_EOL);
            dump(Comment::where('id','=',$z)->first());
        }
        exit();
        dd(Comment::all()->first());

    }
}
