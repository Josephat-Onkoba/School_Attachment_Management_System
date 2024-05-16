<?php

use Illuminate\Support\Facades\Route;

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