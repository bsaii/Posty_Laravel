<?php

use App\Http\Controllers\Auth\RegisterController; //imported the RegisterController
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Making a route with a controller

// register requests
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// login requests
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

// logout requests
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

// dashboard requests
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
//->middleware('auth'); //another way of adding auth middleware

// Homepage
Route::get('/', function () {
    return view('home');
})->name('home');


// Posts 
Route::get('/posts', [PostsController::class, 'index'])->name('posts');
// show a single post
Route::get('/posts/{post}', [PostsController::class, 'show'])->name('post.show');
Route::post('/posts', [PostsController::class, 'store']);
Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');

// Like posts
// post was passed in here instead of the id to access the model to make code simple
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.like');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.like');

// User Post
Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('user.posts');
