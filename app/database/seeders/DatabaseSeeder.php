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
      // $user = User::factory(10)
      //     ->has(Post::factory())
      //          ->has(Comment::factory(10)->for(Post::factory()->for(User::factory(),'owner'),'post'))
      //     ->create(); // make
        //

      //  $user = User::factory(10)
      //      ->has(Post::factory())
      //      ->has(Comment::factory(10)->for(Post::factory()->for(User::factory(),'owner'),'post'))
      //      ->create(); // make
        //
       $colectz = collect(Post::all());

        Comment::factory()->recycle($colectz)->create();


           // User::factory()->recycle(Post::factory()->forOwner()->create())->create();




                $this->call([
           // CommentTableSeeder::class, // index 0- 100
            //ChildrenCommentTableSeeder::class,
            ]);

    }

}
