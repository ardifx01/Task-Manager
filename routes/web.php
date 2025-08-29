<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\TaskViewController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TaskController;

// Auth routes
Route::get("/", [AuthController::class, 'index'])->name('home');
Route::get("/login", [AuthController::class, 'login'])->name('login');
Route::get("/register", [AuthController::class, 'register'])->name('register');
Route::post('register_post', [AuthController::class, 'register_post']);
Route::post('login_post', [AuthController::class, 'login_post']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('projects', ProjectController::class);

    // task routes
    Route::get('projects/{project}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('projects/{project}/tasks', [TaskController::class, 'store'])->name('tasks.store');
    Route::put('/admin/projects/{project}/complete', [ProjectController::class, 'complete'])->name('projects.complete');
    Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
});

// User routes
Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('tasks', [TaskViewController::class, 'index'])->name('tasks.index');
    Route::post('tasks/{task}/update-status', [TaskViewController::class, 'updateStatus'])->name('tasks.updateStatus');
});