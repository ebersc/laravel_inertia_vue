<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::delete('/logout', [LoginController::class, 'destroy'])->name('login.destoy');
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::post('/users', [UserController::class, 'store'])->name('user.store');

Route::delete('/user/delete', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/posts', [PostController::class, 'index'])->name('post.index');

Route::delete('/posts/delete/{post}', [PostController::class, 'destroy'])->name('post.destroy')->can('delete', 'post');

Route::fallback(function (){
    return inertia('Errors/404');
});
