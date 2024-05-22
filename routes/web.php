<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HodController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DashboardController;
use App\Models\User;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/auth/login', function () {
    return view('auth/login');
});

Route::get('/auth/login', [AuthController::class, 'login'])->name('login');;
Route::post('/login', [AuthController::class, 'Authlogin'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout']);


// Activate
Route::get('/auth/activate', [StudentController::class, 'activateform'])->name('activateForm');
Route::post('/auth/activate', [StudentController::class, 'activate'])->name('activate');

// Authenticated routes
Route::middleware(['auth'])->group(function () {
    Route::middleware(['user.type:' . User::TYPE_HOD])->group(function () {
        // Routes for HOD
        Route::get('/HOD/dashboard', [DashboardController::class, 'dashboard'])->name('hod.dashboard');
        Route::post('/batch-upload', [HodController::class, 'upload'])->name('upload');
    });

    Route::middleware(['user.type:' . User::TYPE_STAFF])->group(function () {
        // Routes for Staff
        Route::get('/staff/dashboard', [DashboardController::class, 'dashboard'])->name('staff.dashboard');
    });

    Route::middleware(['user.type:' . User::TYPE_STUDENT])->group(function () {
        // Routes for Students
        Route::get('/student/dashboard', [DashboardController::class, 'dashboard'])->name('student.dashboard');
    });
});

// Non-authenticated routes for students
Route::middleware(['user.type:' . User::TYPE_STUDENT])->group(function () {
    
    // Set Password
    Route::get('/auth/setpassword', [StudentController::class, 'showSetPasswordForm'])->name('setPasswordForm');
    Route::post('/auth/setpassword', [StudentController::class, 'setPassword'])->name('setPassword');
});