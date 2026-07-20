<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');
Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');

Route::get('/admin/dashboard', function () {
    return 'admin.dashboard';
})->name('admin.dashboard');

Route::get('/student/dashboard', function () {
    return 'student.dashboard';
})->name('student.dashboard');
