<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('parent', App\Http\Api\Controllers\ParentController::class);
Route::apiResource('users', App\Http\Api\Controllers\UserController::class);
Route::apiResource('student', App\Http\Api\Controllers\StudentController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
