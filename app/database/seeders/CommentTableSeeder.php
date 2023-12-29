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
        $post_id = collect(Post::all());

        for ($z = 1,$i = 0;$i < 10;$i++,$z++) {
            $data[] = [
                'user_id' => $id = $z,
                'post_id' => $post_id->where('id','=',$id)->value('id'),
                'comment' => fake()->text,
            ];
            $z = 0;
        }

        foreach ($data as $comment) {
            Comment::insert($comment);
        }
    }
}
