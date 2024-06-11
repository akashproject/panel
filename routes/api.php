<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Batches
Route::get('/batches', [App\Http\Controllers\Api\BatchController::class, 'index']);
Route::get('/batch/{id}', [App\Http\Controllers\Api\BatchController::class, 'show']);

// Teachers
Route::get('/teachers', [App\Http\Controllers\Api\TeacherController::class, 'index']);
Route::get('/teacher/{id}', [App\Http\Controllers\Api\TeacherController::class, 'show']);

//