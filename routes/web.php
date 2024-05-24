<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Auth::routes();


Route::get('/signin', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/signin', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::get('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/signup', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

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
    
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::group(['prefix' => 'administrator'], function () {
    
    Route::group(['middleware' => ['auth', 'verified','role:super-admin|admin']], function () {
        Route::get('/dashboard', [App\Http\Controllers\Administrator\IndexController::class, 'index'])->name('dashboard');
        Route::get('/', [App\Http\Controllers\Administrator\IndexController::class, 'index'])->name('administrator');
        
        //Users
        Route::get('/users', [App\Http\Controllers\Administrator\UserController::class, 'index'])->name('admin-all-users');
        Route::get('/users/{role_id}', [App\Http\Controllers\Administrator\UserController::class, 'userByCategory'])->name('admin-users');
        Route::get('/user/{id}', [App\Http\Controllers\Administrator\UserController::class, 'show'])->name('admin-user');
        Route::post('/save-user', [App\Http\Controllers\Administrator\UserController::class, 'save'])->name('admin-save-user');
        Route::get('/delete-user/{id}', [App\Http\Controllers\Administrator\UserController::class, 'delete'])->name('admin-delete-user');
        Route::get('/approve-user/{id}', [App\Http\Controllers\Administrator\UserController::class, 'approve'])->name('admin-approve-user');

        //Slots
        Route::get('/schedules', [App\Http\Controllers\Administrator\ScheduleController::class, 'index'])->name('admin-schedules');
        Route::get('/show-schedule', [App\Http\Controllers\Administrator\ScheduleController::class, 'show'])->name('admin-show-schedule');
        Route::post('/save-schedule', [App\Http\Controllers\Administrator\ScheduleController::class, 'save'])->name('admin-save-schedule');
        Route::get('/delete-schedule/{id}', [App\Http\Controllers\Administrator\ScheduleController::class, 'delete'])->name('admin-delete-schedule');

        // Assign Slots
        Route::get('/teacher-slots/{teacher_id}', [App\Http\Controllers\Administrator\TeacherSlotController::class, 'index'])->name('admin-teacher-slots');
        Route::post('/assign-slot-to-teacher', [App\Http\Controllers\Administrator\TeacherSlotController::class, 'save'])->name('assign-slot-to-teacher');

        //Courses
        Route::get('/courses', [App\Http\Controllers\Administrator\CourseController::class, 'index'])->name('admin-courses');
        Route::get('/add-course', [App\Http\Controllers\Administrator\CourseController::class, 'Add'])->name('admin-add-course');
        Route::get('/show-course/{id}', [App\Http\Controllers\Administrator\CourseController::class, 'show'])->name('admin-show-course');
        Route::post('/save-course', [App\Http\Controllers\Administrator\CourseController::class, 'save'])->name('admin-save-course');
        Route::get('/delete-course/{id}', [App\Http\Controllers\Administrator\CourseController::class, 'delete'])->name('admin-delete-course');
        Route::get('/curriculum/{id}', [App\Http\Controllers\Administrator\CourseController::class, 'curriculum'])->name('admin-curriculum');
        Route::post('/save-curriculum', [App\Http\Controllers\Administrator\CourseController::class, 'saveCurriculum'])->name('admin-save-curriculum');

        //Course Type
        Route::get('/course-type', [App\Http\Controllers\Administrator\CourseTypeController::class, 'index'])->name('admin-course-type');
        Route::get('/add-course-type', [App\Http\Controllers\Administrator\CourseTypeController::class, 'add'])->name('admin-add-course-type');
        Route::get('/view-course-type/{id}', [App\Http\Controllers\Administrator\CourseTypeController::class, 'show'])->name('admin-view-course-type');
        Route::post('/save-course-type', [App\Http\Controllers\Administrator\CourseTypeController::class, 'save'])->name('admin-save-course-type');
        Route::get('/delete-course-type/{id}', [App\Http\Controllers\Administrator\CourseTypeController::class, 'delete'])->name('admin-delete-course-type');

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
    });  
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('website');    
});
