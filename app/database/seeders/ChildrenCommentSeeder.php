<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ChildrenCommentSeeder extends Seeder
{
    public function run(): void
    {
        $users = collect(User::all()->modelKeys());
        $comments = Comment::all()->sortBy('id');
        $comments = $comments->toArray();

        foreach ($users as $user) {
            foreach ($comments as $comment) {
                $data[] = [
                    'post_id' => $comment['post_id'],
                    'parent_id' => $comment['id'],
                    'user_id' => $users->random(),
                    'comment' => fake()->text,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }
        foreach ($data as $parent_comment) {
            Comment::insert($parent_comment);
        }
    }
}
