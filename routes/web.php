<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\User\TaskViewController;


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
    Route::get('user/tasks', [TaskViewController::class, 'index'])->name('user.tasks');
    Route::post('user/tasks/{task}/update-status', [TaskViewController::class, 'updateStatus'])->name('user.tasks.updateStatus');
});

Route::get('/logout', [Authcontroller::class, 'logout'])->name('logout');

Route::resource('admin/tasks', TaskController::class, ['as' => 'admin']);

Route::get('user/tasks', [TaskViewController::class, 'index'])->name('user.tasks');

