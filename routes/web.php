<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Home page:

Route::get('/', function () {
    return view('Pages.home');
});

// Authentication pages:

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');

    Route::post('/register', [AuthController::class, 'registerUser'])->name('register-user');

    Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');

    Route::post('/login', [AuthController::class, 'loginUser'])->name('login-user');
});

Route::post('/logout', [AuthController::class, 'logoutUser'])->name('logout')->middleware('auth');

Route::get('/posts', [PostController::class, 'postsForReaders'])->name('posts-readers')->middleware('auth');

// Admin only:

Route::middleware(['role:admin'])->group(function(){
    Route::get('/dashboard/users', [AdminController::class, 'usersIndex'])->name('users.index');
    Route::delete('/dashboard/users/{id}/delete', [AdminController::class, 'deleteUser'])->name('users.delete');
    Route::get('/dashboard/roles', [AdminController::class, 'rolesIndex'])->name('roles.index');
    Route::post('/dashboard/roles', [AdminController::class, 'storeRole'])->name('roles.store');
    Route::get('/dashboard/roles/{id}/edit', [AdminController::class, 'editRoleForm'])->name('roles.edit');
    Route::get('/dashboard/permissions', [AdminController::class, 'permissionsIndex'])->name('permissions.index');
    Route::put('/dashboard/roles/{id}', [AdminController::class, 'updateRole'])->name('roles.update');
    Route::post('/dashboard/roles/assign', [AdminController::class, 'assignRoleToUser'])->name('roles.assign');
    Route::delete('/dashboard/roles/{id}/delete', [AdminController::class, 'deleteRole'])->name('roles.delete');
    Route::post('/dashboard/permissions',[AdminController::class, 'storePermission'])->name('permissions.store');
    Route::delete('/dashboard/permissions/{id}/delete', [AdminController::class, 'deletePermission'])->name('permissions.delete');
});

// Admin and writer only:

Route::middleware(['role:admin|writer'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/posts', [PostController::class, 'index'])->name('posts.index');
});
