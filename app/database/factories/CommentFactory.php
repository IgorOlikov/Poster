<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           // 'post_id' => Post::inRandomOrder()->first()->id,
           // //'parent_id' => Comment::factory()->count(1),
           //'user_id' => User::inRandomOrder()->first()->id,
           //'user_id' => User::factory(),
           //'post_id' => Post::factory()->forOwner(),
            'comment' => fake()->text,
        ];
    }
    public function parent_id(): Factory
    {
        return $this->afterCreating(function (Comment $comment){
          return ['parent_id' => Comment::inRandomOrder()->first()->id];
        });
    }

    public function pranetfill(): Factory
    {
        return $this->state(new Sequence(fn(Sequence $sequence) => ['user_id' => User::all()]));

    }
}
