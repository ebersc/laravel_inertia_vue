<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);
Route::delete('/user/delete', [UserController::class, 'destroy']);
