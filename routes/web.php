<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Student\EventController as StudentEventController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\Admin\AdminRegistrationController;
use App\Models\Event;


// Home Page
Route::get('/', function () {
    $events = Event::latest()->take(4)->get();

    return view('welcome', compact('events'));
})->name('home');


// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::resource('events', EventController::class);
    

    Route::get('/registrations', [AdminRegistrationController::class, 'index'])
        ->name('admin.registrations.index');

    Route::delete('/registrations/{registration}', [AdminRegistrationController::class, 'destroy'])
        ->name('admin.registrations.destroy');

    Route::get('/registrations/{registration}', [AdminRegistrationController::class, 'show'])
        ->name('admin.registrations.show');
    Route::put('/registrations/{registration}', [AdminRegistrationController::class, 'update'])
        ->name('admin.registrations.update');
});

// Student Routes
Route::middleware(['auth', 'student'])->prefix('student')->group(function () {

    Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard');
    Route::get('/student/events', [StudentEventController::class, 'index'])
        ->name('student.events.index');

    Route::get('/student/events/{event}', [StudentEventController::class, 'show'])
        ->name('student.events.show');

    Route::get('/student/registrations', [RegistrationController::class, 'index'])
        ->name('student.tickets.index');

    Route::post('/student/events/{event}/register', [RegistrationController::class, 'store'])
        ->name('student.registrations.store');

    Route::get('/student/registrations/{registration}', [RegistrationController::class, 'show'])
        ->name('student.registrations.show');

    Route::get('/student/registrations/{registration}/pdf', [RegistrationController::class, 'generatePDF'])
        ->name('student.registrations.pdf');

    Route::get('/student/profile', [AuthController::class, 'profile'])->name('student.profile');
    Route::get('/student/profile/edit', [AuthController::class, 'EditProfile'])->name('student.profile.edit');
    Route::put('/student/profile', [AuthController::class, 'updateProfile'])->name('student.profile.update');
});
