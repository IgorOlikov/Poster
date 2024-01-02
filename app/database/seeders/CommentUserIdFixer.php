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
}
