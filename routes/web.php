<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/files');
    } else {
        return view('welcome');
    }
})->name('login');

//login, register views
Route::get('/login', function() {
    return view('auth/login');
});

Route::get('/register', function() {
    return view('auth/register');
});

Route::resource('files', FileController::class)->middleware('auth');
Route::resource('users', UserController::class)->middleware('auth');

//register, login, logout requests
Route::post('/register', [SessionController::class, 'storeRegister']);
Route::post('/login', [SessionController::class, 'storeLogin']);
Route::post('/logout', [SessionController::class, 'destroy']);


