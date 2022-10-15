<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\StudentGroupController;
use App\Http\Controllers\Admin\TeacherController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.home.dashboard');
    })->name('dashboard');

    Route::prefix('admin')->group(function (){
        //permissions route
        Route::resource('permissions', PermissionController::class);
        //roles route
        Route::resource('roles', RoleController::class);
        //User route
        Route::resource('users', UserController::class);
        //Settings route
        Route::resource('settings', SettingsController::class);
        //Admin route
        Route::resource('admins', AdminController::class);
//        Designation route
        Route::resource('designations', DesignationController::class);
        // Teacher Route
        Route::resource('teachers', TeacherController::class);


//        Student Group Routes
        Route::resource('student-groups', StudentGroupController::class);
    });
});


