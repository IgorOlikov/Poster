<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/posts',[PostController::class, 'index'])->name('posts');
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');

