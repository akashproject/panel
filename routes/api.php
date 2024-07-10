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
Route::get('/get-trainer-sessions/{trainer_id}', [App\Http\Controllers\Api\BatchController::class, 'getSessionByTrainer']);

Route::get('/today-sessions', [App\Http\Controllers\Api\BatchController::class, 'todaySessions']);
Route::get('/tommrow-sessions', [App\Http\Controllers\Api\BatchController::class, 'tommrowSessions']);

// Teachers
Route::get('/teachers', [App\Http\Controllers\Api\TeacherController::class, 'index']);
Route::get('/teacher/{id}', [App\Http\Controllers\Api\TeacherController::class, 'show']);

// User
Route::get('/user/{id}', [App\Http\Controllers\Api\UserController::class, 'index'])->name('user');
Route::get('/user', [App\Http\Controllers\Api\UserController::class, 'getAuthUser'])->name('getAuthUser');
Route::post('/signup', [App\Http\Controllers\Api\UserController::class, 'register'])->name('register');
Route::post('/get-otp', [App\Http\Controllers\Api\UserController::class, 'getOtp'])->name('get-otp');
Route::post('/login', [App\Http\Controllers\Api\UserController::class, 'login'])->name('login');
Route::get('/logout', [App\Http\Controllers\Api\UserController::class, 'logout'])->name('logout');
Route::put('/updateprofile', [App\Http\Controllers\Api\UserController::class, 'updateprofile'])->name('userupdate');

// Purchesed Session
Route::get('/live-purchased-sessions', [App\Http\Controllers\Api\PurchasedController::class, 'liveSessions'])->name('live-purchased-sessions');
Route::get('/upcoming-purchased-sessions', [App\Http\Controllers\Api\PurchasedController::class, 'upcomingSessions'])->name('upcoming-purchased-sessions');
Route::get('/past-purchased-sessions', [App\Http\Controllers\Api\PurchasedController::class, 'pastSessions'])->name('past-purchased-sessions');
Route::get('/join-stream/{id}', [App\Http\Controllers\Api\PurchasedController::class, 'joinStream'])->name('join-stream');

//Order
Route::any('/orders', [App\Http\Controllers\Api\OrderController::class, 'index'])->name('orders');
Route::post('/apply-coupon', [App\Http\Controllers\Api\OrderController::class, 'applyCoupon'])->name('apply-coupon');
Route::post('/create-order', [App\Http\Controllers\Api\OrderController::class, 'create'])->name('create-order');
Route::post('/payment', [App\Http\Controllers\Api\OrderController::class, 'payment'])->name('payment');


//Settings
Route::get('/all-settings', [App\Http\Controllers\Api\SettingsController::class, 'allSettings'])->name('all-settings');
Route::get('/all-states', [App\Http\Controllers\Api\OrderController::class, 'getStates'])->name('all-states');