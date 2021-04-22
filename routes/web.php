<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
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

Route::get('/posts/create', [PostController::class, 'create']);
Route::post('/posts', [PostController::class, 'store']);

Route::get('/posts/{post}', [PostController::class, 'show'])->name('post');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('createComment');

Route::get('/register', [AuthController::class, 'getRegisterForm']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/login', [AuthController::class, 'getLoginForm']);
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/login', [AuthController::class, ''])
