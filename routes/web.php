<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Pages.home');
});

Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');   

Route::post('/register', [AuthController::class, 'registerUser'])->name('register-user');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');

Route::post('/login', [AuthController::class, 'loginUser'])->name('login-user');

Route::post('/logout', [AuthController::class, 'logoutUser'])->name('logout')->middleware('auth');

Route::middleware(['role:writer'])->group(function (){
   
});