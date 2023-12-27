<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     //  $post = Post::factory()->create();

     //  User::factory()->count(3)
     //      //->has(Post::factory()->count(3),'user_posts')
     //        ->has($post)
     //          ->create();
    User::factory()->hasHasPosts(3)->create();



    }
}
