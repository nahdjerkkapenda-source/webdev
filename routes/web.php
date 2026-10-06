<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

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



Route::get('/books', [BookController::class, 'books'])
    ->middleware('auth');

Route::get('/settings', function () {
    return view('settings');
})->middleware('auth');




Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Route::post('/add-book', [App\Http\Controllers\BookController::class, 'addBook']);

Route::get('/books', [BookController::class, 'index']);

