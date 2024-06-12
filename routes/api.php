<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE, PATCH');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Batches
Route::get('/batches', [App\Http\Controllers\Api\BatchController::class, 'index']);
Route::get('/batch/{id}', [App\Http\Controllers\Api\BatchController::class, 'show']);

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