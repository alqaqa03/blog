<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostsController::class,'index'])->name('posts.index');

Route::get('/posts/creat', [PostsController::class,'creat'])->name('posts.creat');

Route::get('/posts/{post}', [PostsController::class,'show'])->name('posts.show');

Route::post('/posts', [PostsController::class,'store'])->name('posts.store') ;

Route::get('/posts/{post}/edit',[PostsController::class,'edit'])->name('posts.edit');

Route::put('/posts/{post}',[PostsController::class,'update'])->name('posts.update');

Route::delete('/posts/{post}',[PostsController::class,'destroy'])->name('posts.destroy');

// 1- structure change for database (creat table , edit column , remove column)
// 2- operations on database (insert record ,edit record ,delete record)