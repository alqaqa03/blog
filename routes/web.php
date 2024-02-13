<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/posts', [PostsController::class,'index'])->name('posts.index');
Route::get('/posts/creat', [PostsController::class,'creat'])->name('posts.creat');
Route::get('/posts/{post}', [PostsController::class,'show'])->name('posts.show');
Route::post('/posts', [PostsController::class,'store'])->name('posts.store') ;
Route::get('/posts/{post}/edit',[PostsController::class,'edit'])->name('posts.edit');
Route::put('/posts/{post}',[PostsController::class,'update'])->name('posts.update');
Route::delete('/posts/{post}',[PostsController::class,'destroy'])->name('posts.destroy');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
