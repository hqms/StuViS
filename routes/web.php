<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ViolationController;

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Violation routes
Route::middleware(['auth'])->group(function () {
    Route::resource('violations', ViolationController::class);
    
    // Additional routes for viewing violation history
    Route::get('/violations/history', [ViolationController::class, 'history'])->name('violations.history');
});

// Home route
Route::get('/', function () {
    return view('welcome');
});