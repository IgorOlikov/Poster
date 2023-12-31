<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
require __DIR__.'/auth.php';


  //  Route::get('/', function () {
  //      return view('welcome');
  //  });

Route::get('/', [HomeController::class,'index'])
    //->middleware(['auth', 'verified'])
    ->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/users/{user}',[UserController::class,'show'])->name('user.show');
Route::get('/users/{user}/create-image',[UserController::class,'createImage'])->name('create-image.profile.image');
Route::post('/users/{user}/upload',[UserController::class,'uploadProfileImage'])->name('upload.profile.image');




Route::get('/posts',[PostController::class, 'index'])->name('posts');
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');
Route::post('/posts',[PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');



Route::get('/posts/{post}/comments',[PostCommentController::class, 'index'])->name('posts.comments.index');
Route::get('/posts/{post}/comments/create',[PostCommentController::class, 'create'])->name('posts.comments.create');
Route::get('/posts/{post}/comments/{comment}/create',[PostCommentController::class, 'create_children'])->name('posts.comments.children.create');
Route::get('/posts/{post}/comments/{comment}/edit',[PostCommentController::class, 'edit'])->name('posts.comments.edit');



Route::get('/comments',[CommentController::class, 'index'])->name('comments.index');
Route::get('/comments/create',[CommentController::class, 'create'])->name('comments.create');
Route::get('/comments/{comment}',[CommentController::class, 'show'])->name('comments.show');
Route::post('/comments/{post}',[CommentController::class, 'store'])->name('comments.store'); //admin??? error
Route::get('/comments/{comment}/edit',[CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comment}',[CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comment}',[CommentController::class, 'destroy'])->name('comments.destroy');

