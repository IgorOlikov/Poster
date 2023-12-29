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
         User::factory(10)->has(Post::factory())
            ->create();

        $this->call([
            CommentTableSeeder::class,
            ChildrenCommentTableSeeder::class,
            ]);

    }

}
