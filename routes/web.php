<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\FollowsController;

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


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('profile/{profile}',[ProfileController::class,'index'])->name('profile.index');
Route::get('profile/{profile}/edit',[ProfileController::class,'edit'])->name('profile.edit');
Route::put('profile/{profile}',[ProfileController::class,'update'])->name('profile.update');
Route::get('/', [PostController::class,'index'])->name('posts.index');
Route::resource('posts',PostController::class);

Route::post('follow/{user}',[FollowsController::class,'store']);