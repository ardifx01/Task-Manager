<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\DashboardController;

Route::get("/", [Authcontroller::class, 'index']);
Route::get("/login", [Authcontroller::class, 'login']);
Route::get("/register", [Authcontroller::class, 'register']);

Route::post('register_post', [Authcontroller::class, 'register_post']);
Route::post('login_post', [Authcontroller::class, 'login_post']);

Route::group(['middleware' => 'admin'], function () {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware' => 'user'], function () {
    Route::get('user/dashboard', [DashboardController::class, 'dashboard']);
});

Route::get('/logout', [Authcontroller::class, 'logout'])->name('logout');
