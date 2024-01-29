<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostsController;

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

Route::get('/post-create',[HomeController::class,'userCreate']);
Route::post('/post-store',[PostsController::class,'userStore']);
Route::get("/post-edit/{id}",[PostsController::class,'userEdit']);
Route::put("/post-update/{post}",[PostsController::class,'userUpdate'])->name('posts.update');
Route::delete("/post-delete/{id}",[PostsController::class,'userDelete']);


Route::get('/posts{id}',[PostsController::class,'status']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
