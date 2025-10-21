<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViolationController;

// API routes for the Student Violation System

Route::middleware('api')->group(function () {
    // Routes for managing violations
    Route::apiResource('violations', ViolationController::class);

    // Additional routes can be added here
});