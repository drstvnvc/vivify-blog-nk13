<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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

Route::get('/posts', [PostController::class, 'index']);

Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/posts', [PostController::class, 'store'])->middleware('auth');

Route::get('/posts/{post}', [PostController::class, 'show'])->name('post');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('createComment');

Route::group(['middleware' => 'guest'], function () {
  Route::get('/register', [AuthController::class, 'getRegisterForm']);
  Route::post('/register', [AuthController::class, 'register']);
  Route::get('/login', [AuthController::class, 'getLoginForm'])->name('login');
  Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/users/{user}', [UserController::class, 'show'])->name('user');
