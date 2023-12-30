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
        $comments_keys = collect(Comment::all()->modelKeys());

        $comments_size = Comment::count();
        $users_size = User::count();

        $trash = $comments_keys->splice($users_size);

        for ($i = 0;$i < $comments_size;$i++) {
            $comments_keys = $comments_keys->concat($comments_keys);
            if ($comments_keys->count() > $comments_size){
                break;
            }
        }
        $comments_keys = $comments_keys->take($comments_size);
        //dd($comments_keys->all());
       // foreach ($comments_keys as $comments_key){
       //    print $comments_key.PHP_EOL;
       // }
       // exit();
     $db  = Comment::all();
        dd($db);
        //dd($comments_keys);

     // foreach ($comments_keys as $comments_key) {
     //     $x = 0;
     //     Comment::where()->update(['user_id' => $comments_key]);
     //     $x++;
     // }
     //    dd($x);
      //  foreach ($comments as $comment){
      //      $comment['user_id'] = $comment-
      //  }


      // foreach ($data as $comment) {
      //     Comment::insert($comment);
      // }
    }
}
