<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildrenCommentTableSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        $users = collect(User::all()->modelKeys());
        $posts = collect(Post::all()->modelKeys());
        $comment_count = Comment::count();
        $user_count = User::count();
        $comments = Comment::all();


        //$comments = $comments->toArray();
        //dd($comments->first()->id); //2
        //dd(Comment::where('id','=',1)->value('id')); //1
        dd($comments[0]); //2

        for ($i = 0;$i < $comment_count;$i++) { //$i total comments 100
                 //$post_id  = $posts[$i]['id'];
                  $post_id = $comments[$i]['post_id'];
                    $parent_id = $comments[0];
                    dd($comments[0]);
            for ($z = 0;$z < $user_count;$z++) { // 10 users write 10 comments for 1 existing comment
                $data[] = [
                    'post_id' => $post_id, // [4,6,9]
                    'parent_id' => $parent_id, //where
                    'user_id' => $users->random(), // ?
                    'comment' => fake()->text,
                ];
                foreach ($data as $parent_comment) {
                    Comment::insert($parent_comment);
                }
            }
            exit();
        }

    }
}
