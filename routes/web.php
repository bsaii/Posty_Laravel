<?php

use App\Http\Controllers\Auth\RegisterController; //imported the RegisterController
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
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
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Homepage
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/posts', function () {
    return view('posts.index');
});
