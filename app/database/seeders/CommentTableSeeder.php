<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $user_id = collect(User::all()->modelKeys());
        $post_id = collect(Post::all()->modelKeys());

        for ($i = 0;$i < 100;$i++) {
            $data[] = [
                'user_id' => $user_id->random(),
                'post_id' => $post_id->random(),
                'comment' => fake()->text,
            ];
        }

        foreach ($data as $comment) {
            Comment::insert($comment);
        }
    }
}
