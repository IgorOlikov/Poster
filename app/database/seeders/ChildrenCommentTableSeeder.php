<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChildrenCommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $user_id = collect(User::all()->modelKeys());
        $post_id = collect(Post::all()->modelKeys());
        $comment = collect(Comment::all()->modelKeys());

        for ($i = 0;$i < 10;$i++) {
            $data[] = [

                'post_id' => $ppp = $post_id->random(), // [4,6,9]
                'parent_id' => $comment->where('post_id','=',$ppp)->get('id'),
                'user_id' => $user_id->random(),
                'comment' => fake()->text,
            ];
        }

        foreach ($data as $comment) {
            Comment::insert($comment);
        }
    }
}
