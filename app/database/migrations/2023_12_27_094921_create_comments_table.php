<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('posts');
            $table->foreignId('parent_id')->nullable()->constrained('comments');
            $table->foreignId('user_id')->constrained('users');
            $table->text('comment');
            $table->integer('like',false,true)->default(0);
            $table->integer('dislike',false,true)->default(0);
            $table->integer('total_comments',false,true)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
