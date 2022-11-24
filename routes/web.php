<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\Auth\RegisterController;
use App\Http\controllers\DashbordController;
use App\Http\controllers\Auth\LoginController;
use App\Http\controllers\Auth\LogoutController;
use App\Http\controllers\PostController;
use App\Http\controllers\PostLikeController;
use App\Http\controllers\UserPostController;
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

Route::get('/', [PostController::class,'index'])->name('home');
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::POST('/register',[RegisterController::class,'store']);
Route::get('/dashbord',[DashbordController::class,'index'])->name('dashbord');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::POST('/login',[LoginController::class,'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout');


Route::get('/post',[PostController::class,'index'])->name('post');
Route::post('/post',[PostController::class,'store']);
Route::delete('/post/{post}',[PostController::class,'destroy'])->name('post.destroy');


Route::post('/post/{post}/likes',[PostLikeController::class,'store'])->name('post.likes');
Route::delete('/post/{post}/likes',[PostLikeController::class,'destroy'])->name('post.likes');

Route::get('users/{user:username}/post',[UserPostController::class,'index'])->name('users.post');