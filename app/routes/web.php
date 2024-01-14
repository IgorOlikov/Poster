<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Post\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadUserAvatar;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

//PUBLIC
Route::get('/', [HomeController::class,'index'])
    //->middleware(['auth', 'verified'])
    ->name('home');

Route::get('/users/{user}',[UserController::class,'show'])->name('user.show');

Route::get('/posts',[PostController::class, 'index'])->name('posts');
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/comments',[CommentController::class, 'index'])->name('posts.comments.index');

//PROTECTED
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/avatar/create',[UserController::class,'createImage'])->name('create-image.profile.image');
    Route::post('/avatar/upload',UploadUserAvatar::class)->name('upload.profile.image');


    Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('/posts/{post}/comments/create',[CommentController::class, 'create'])->name('posts.comments.create');
    Route::get('/posts/{post}/comments/{comment}/create',[CommentController::class, 'create_children'])->name('posts.comments.children.create');
    Route::get('/posts/{post}/comments/{comment}/edit',[CommentController::class, 'edit'])->name('posts.comments.edit');
    Route::post('/posts/{post}/comments/{comment}/store',[CommentController::class, 'store_children'])->name('posts.comments.children.store');

    Route::get('/comments',[CommentController::class, 'index'])->name('comments.index');
    Route::get('/comments/create',[CommentController::class, 'create'])->name('comments.create');
    Route::get('/comments/{comment}',[CommentController::class, 'show'])->name('comments.show');
    Route::post('/comments/{post}',[CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{comment}/edit',[CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/comments/{comment}',[CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}',[CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::prefix('/admin')->middleware(['auth','admin'])->group(function (){
    Route::get('/', [AdminController::class,'index'])->name('admin.index');
});
