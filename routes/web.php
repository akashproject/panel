<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Auth::routes();

Route::get('/signin', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/signin', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

// Route::get('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/invoice', [App\Http\Controllers\HomeController::class, 'invoice'])->name('invoice');
    
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::group(['prefix' => 'administrator'], function () {
    
    Route::group(['middleware' => ['auth', 'verified','role:super-admin|admin']], function () {
        Route::get('/dashboard', [App\Http\Controllers\Administrator\IndexController::class, 'index'])->name('dashboard');
        Route::get('/', [App\Http\Controllers\Administrator\IndexController::class, 'index'])->name('administrator');
        Route::get('/mail-template/{template}', [App\Http\Controllers\Administrator\IndexController::class, 'chcekMailTemplate'])->name('admin-mail-template');
        // Users
        Route::get('/users', [App\Http\Controllers\Administrator\UserController::class, 'index'])->name('admin-all-users');
        Route::get('/users/{role_id}', [App\Http\Controllers\Administrator\UserController::class, 'userByCategory'])->name('admin-users');
        Route::get('/add-user', [App\Http\Controllers\Administrator\UserController::class, 'add'])->name('admin-add-user');
        Route::get('/user/{id}', [App\Http\Controllers\Administrator\UserController::class, 'show'])->name('admin-user');
        Route::post('/save-user', [App\Http\Controllers\Administrator\UserController::class, 'save'])->name('admin-save-user');
        Route::post('/save-profile', [App\Http\Controllers\Administrator\UserController::class, 'saveProfile'])->name('admin-save-profile');
        Route::post('/insert-user', [App\Http\Controllers\Administrator\UserController::class, 'insert'])->name('admin-insert-user');
        Route::get('/delete-user/{id}', [App\Http\Controllers\Administrator\UserController::class, 'delete'])->name('admin-delete-user');
        Route::get('/approve-user/{id}/{is_approve}', [App\Http\Controllers\Administrator\UserController::class, 'approve'])->name('admin-approve-user');
        
        // Add Stream Player
        Route::get('/add-stream-player/{id}', [App\Http\Controllers\Administrator\UserController::class, 'addStreamPlayer'])->name('admin-add-stream-player');
        Route::post('/save-stream-player', [App\Http\Controllers\Administrator\UserController::class, 'saveStreamPlayer'])->name('admin-save-stream-player');

        //Slots
        Route::get('/slots', [App\Http\Controllers\Administrator\SlotController::class, 'index'])->name('admin-slots');
        Route::get('/show-slot', [App\Http\Controllers\Administrator\SlotController::class, 'show'])->name('admin-show-slot');
        Route::post('/save-slot', [App\Http\Controllers\Administrator\SlotController::class, 'save'])->name('admin-save-slot');
        Route::get('/delete-slot/{id}', [App\Http\Controllers\Administrator\SlotController::class, 'delete'])->name('admin-delete-slot');

        // Assign Slots
        Route::get('/teacher-slots/{teacher_id}', [App\Http\Controllers\Administrator\TeacherSlotController::class, 'index'])->name('admin-teacher-slots');
        Route::post('/assign-slot-to-teacher', [App\Http\Controllers\Administrator\TeacherSlotController::class, 'save'])->name('assign-slot-to-teacher');

        // Courses
        Route::get('/courses', [App\Http\Controllers\Administrator\CourseController::class, 'index'])->name('admin-courses');
        Route::get('/add-course', [App\Http\Controllers\Administrator\CourseController::class, 'Add'])->name('admin-add-course');
        Route::get('/show-course/{id}', [App\Http\Controllers\Administrator\CourseController::class, 'show'])->name('admin-show-course');
        Route::post('/save-course', [App\Http\Controllers\Administrator\CourseController::class, 'save'])->name('admin-save-course');
        Route::get('/delete-course/{id}', [App\Http\Controllers\Administrator\CourseController::class, 'delete'])->name('admin-delete-course');

        // Batches
        Route::get('/batches', [App\Http\Controllers\Administrator\BatchController::class, 'index'])->name('admin-batches');
        Route::get('/show-batch/{id}', [App\Http\Controllers\Administrator\BatchController::class, 'show'])->name('admin-show-batch');
        Route::post('/save-batch', [App\Http\Controllers\Administrator\BatchController::class, 'save'])->name('admin-save-batch');

        // Orders
        Route::get('/orders', [App\Http\Controllers\Administrator\OrderController::class, 'index'])->name('admin-orders');
        Route::get('/order/{id}', [App\Http\Controllers\Administrator\OrderController::class, 'show'])->name('admin-show-order');

        // Rererrer
        Route::get('/referrers', [App\Http\Controllers\Administrator\ReferrerController::class, 'index'])->name('admin-referrers');
        Route::get('/add-referrer', [App\Http\Controllers\Administrator\ReferrerController::class, 'add'])->name('admin-add-referrer');
        Route::get('/referrer/{id}', [App\Http\Controllers\Administrator\ReferrerController::class, 'show'])->name('admin-show-refferer');
        Route::post('/save-referrer', [App\Http\Controllers\Administrator\ReferrerController::class, 'save'])->name('admin-save-referrer');

        Route::get('/refer-earn', [App\Http\Controllers\Administrator\ReferrerController::class, 'referEarn'])->name('admin-refer-earn');

        // Media
        Route::get('/media', [App\Http\Controllers\Administrator\MediaController::class, 'index'])->name('admin-media');
        Route::get('/view-file/{id}', [App\Http\Controllers\Administrator\MediaController::class, 'view'])->name('admin-view-file');
        Route::post('/upload', [App\Http\Controllers\Administrator\MediaController::class, 'save'])->name('admin-save-media');
        Route::post('/save-file', [App\Http\Controllers\Administrator\MediaController::class, 'updateFile'])->name('admin-save-file');
        Route::get('/delete-file/{id}', [App\Http\Controllers\Administrator\MediaController::class, 'delete'])->name('admin-delete-job');
        Route::post('/search-media', [App\Http\Controllers\Administrator\MediaController::class, 'search'])->name('admin-search-media');
        Route::get('/settings', [App\Http\Controllers\Administrator\SettingController::class, 'show'])->name('admin-settings');
        Route::post('/save-settings', [App\Http\Controllers\Administrator\SettingController::class, 'save'])->name('admin-save-settings');
    });

    Route::group(['middleware' => ['role:super-admin']], function () {
        Route::get('/manage-roles', [App\Http\Controllers\Administrator\AccessibilityController::class, 'index'])->name('manage-roles');
        
        Route::get('/create-accessibility', [App\Http\Controllers\Administrator\AccessibilityController::class, 'createAccessibility'])->name('role-master');
        Route::get('/edit-accessibility/{id}', [App\Http\Controllers\Administrator\AccessibilityController::class, 'show'])->name('edit-accessibility');
        Route::post('/save-accessibility', [App\Http\Controllers\Administrator\AccessibilityController::class, 'saveAccessibility'])->name('save-accessibility');
        Route::get('/assign-role/{id}', [App\Http\Controllers\Administrator\AssignRoleController::class, 'index'])->name('assign-role.index');
        Route::post('/assign-role', [App\Http\Controllers\Administrator\AssignRoleController::class, 'save'])->name('assign-role.save');

        Route::get('/permissions', [App\Http\Controllers\Administrator\PermissionController::class, 'index'])->name('permissions');
        Route::post('/save-permission', [App\Http\Controllers\Administrator\PermissionController::class, 'save'])->name('save-permission');
    });
});

Route::group(['middleware' => ['auth', 'verified','role:teacher|super-admin|admin']], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('website');
    Route::get('/account', [App\Http\Controllers\UserController::class, 'account'])->name('account');
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::post('/save-account', [App\Http\Controllers\UserController::class, 'save'])->name('save-account');
    Route::post('/save-profile', [App\Http\Controllers\UserController::class, 'saveProfile'])->name('save-profile');

    //Batchs
    Route::get('/batches', [App\Http\Controllers\BatchController::class, 'index'])->name('batches');
    Route::get('/add-batch', [App\Http\Controllers\BatchController::class, 'add'])->name('add-batch');
    Route::get('/show-batch/{id}', [App\Http\Controllers\BatchController::class, 'show'])->name('show-batch');
    Route::post('/save-batch', [App\Http\Controllers\BatchController::class, 'save'])->name('save-batch');
    Route::get('/delete-batch/{id}', [App\Http\Controllers\BatchController::class, 'delete'])->name('delete-batch');

    //Report
    Route::get('/reports', [App\Http\Controllers\ReportController::class, 'index'])->name('reports');

});
