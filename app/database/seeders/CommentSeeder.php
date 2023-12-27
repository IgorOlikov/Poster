<?php

namespace Database\Seeders;


use Database\Factories\PostFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $post = Post::factory()->create();
       $user = User::factory()->has($post)->create();



      // Comment::factory()
      //    ->for($post)
      //     ->for($user)
      //    ->create();
    }
}
