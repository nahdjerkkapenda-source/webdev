<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('register', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    $user = Auth::user();

    return view('dashboard', ['user' => $user]);
})->middleware('auth');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);