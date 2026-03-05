<?php

use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index']);
Route::get('/index', [LandingPageController::class, 'index']);
Route::get('/rooms/{id}', [LandingPageController::class, 'show'])->name('room.show');

Route::get('/login', [LandingPageController::class, 'login'])->name('login');
Route::get('/register', [LandingPageController::class, 'register'])->name('register');
