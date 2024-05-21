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

Route::get('/auth/activate', function () {
    return view('auth/activate');
});

Route::get('/auth/set-password', function () {
    return view('auth/setpassword');
});


Route::get('/student/dashboard', function () {
    return view('student/dashboard/dashboard');
});
//Route::get('/upload', [AuthController::class, 'showUploadForm']);
Route::post('/upload', [AuthController::class, 'upload'])->name('upload');