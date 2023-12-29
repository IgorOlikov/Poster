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
        $comments = collect(Comment::all());
        $comments_keys = collect(Comment::all()->modelKeys());


      //  for ($i = 0;$i < Comment::count();$i++) {
      //      $data[] = [
      //          'user_id' => $comments_keys[0],
      //          //'post_id' => $post_id->where('id','=',$id)->value('id'),
      //          'comment' => fake()->text,
      //      ];
      //  }
      //
        //dd($comments_keys);

         foreach ($comments_keys as $comments_key => $key) {
             Comment::where('id','=',$key)->update(['user_id' => $key]);
         }

      //  foreach ($comments as $comment){
      //      $comment['user_id'] = $comment-
      //  }


      // foreach ($data as $comment) {
      //     Comment::insert($comment);
      // }
    }
}
