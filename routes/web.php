<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/HOD/dashboard', function () {
    return view('HOD/dashboard/dashboard');
});

Route::get('/auth/login', function () {
    return view('auth/login');
});

// ACTIVATE

Route::get('/auth/activate', [AuthController::class, 'activateform'])->name('activateForm');
Route::post('/auth/activate', [AuthController::class, 'activate'])->name('activate');


//set password
Route::get('/auth/setpassword', [AuthController::class, 'showSetPasswordForm'])->name('setPasswordForm');
Route::post('/auth/setpassword', [AuthController::class, 'setPassword'])->name('setPassword');


Route::get('/student/dashboard', function () {
    return view('student/dashboard/dashboard');
});
//Route::get('/upload', [AuthController::class, 'showUploadForm']);
Route::post('/upload', [AuthController::class, 'upload'])->name('upload');
