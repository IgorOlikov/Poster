<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

       User::factory(10)  //users
            ->has(Post::factory() //posts for 1 user
                ->has(Comment::factory(10) // comments for 1 post
                    ->state(function (array $attributes, Post $post){
                                 return ['user_id' => $post->id];
                })))->create();



       $this->call([
            CommentTableSeeder::class, // index 0- 100
            //ChildrenCommentTableSeeder::class,
       ]);

    }

}
