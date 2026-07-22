<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Student\EventController as StudentEventController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');
Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {


    Route::get('/admin/dashboard', function () {
        return  view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('events', EventController::class);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'student'])->prefix('student')->group(function () {

    Route::get('/student/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');

    Route::get('/student/events', function () {
        return view('student.events.index');
    })->name('student.events.index');


    Route::get('/student/tickets', function () {

        return view('student.registrations.index');
    })->name('student.registrations.index');


    Route::get('/student/events', [StudentEventController::class, 'index'])
        ->name('student.events.index');

    Route::get('/student/events/{event}', [StudentEventController::class, 'show'])
        ->name('student.events.show');

        Route::get('/student/registrations', [RegistrationController::class, 'index'])
            ->name('student.tickets.index');
});
