<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Batches
Route::get('/batches', [App\Http\Controllers\Api\BatchController::class, 'index']);
Route::get('/batch/{id}', [App\Http\Controllers\Api\BatchController::class, 'show']);
Route::get('/live-sessions', [App\Http\Controllers\Api\BatchController::class, 'liveSessions']);
Route::get('/upcoming-sessions', [App\Http\Controllers\Api\BatchController::class, 'upcomingSessions']);

Route::get('/today-sessions', [App\Http\Controllers\Api\BatchController::class, 'todaySessions']);
Route::get('/tommrow-sessions', [App\Http\Controllers\Api\BatchController::class, 'tommrowSessions']);

// Teachers
Route::get('/teachers', [App\Http\Controllers\Api\TeacherController::class, 'index']);
Route::get('/teacher/{id}', [App\Http\Controllers\Api\TeacherController::class, 'show']);

// User
Route::get('/user/{id}', [App\Http\Controllers\Api\UserController::class, 'index'])->name('user');
Route::get('/user', [App\Http\Controllers\Api\UserController::class, 'getAuthUser'])->name('getAuthUser');
Route::post('/signup', [App\Http\Controllers\Api\UserController::class, 'register'])->name('register');
Route::post('/login', [App\Http\Controllers\Api\UserController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Api\UserController::class, 'logout'])->name('logout');
Route::put('/updateprofile', [App\Http\Controllers\Api\UserController::class, 'updateprofile'])->name('userupdate');