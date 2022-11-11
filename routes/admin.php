<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SettingsController;

use App\Http\Controllers\Admin\CustomAuthUserViewController;

use App\Http\Controllers\Admin\SkillsCategoryController;
use App\Http\Controllers\Admin\SkillsSubCategoryController;
use App\Http\Controllers\Admin\JobPostController;
use App\Http\Controllers\Admin\SkillsController;
use App\Http\Controllers\Admin\JobPostQuestionController;


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



        Route::resource('skills-category', SkillsCategoryController::class);
        Route::resource('skills-sub-category', SkillsSubCategoryController::class);
        Route::resource('skills', SkillsController::class);

        Route::resource('job-questions', JobPostQuestionController::class);

    });

//    Frontend client section routes
    Route::prefix('client')->as('client.')->group(function (){
//        job post crud
        Route::resource('job-post', JobPostController::class);
        Route::get('/job-post-list', [JobPostController::class, 'userWiseJobPost'])->name('job-post-list');

        Route::get('/client-dashboard', [CustomAuthUserViewController::class, 'authUserDashboard'])->name('dashboard');
    });

    Route::get('/get-skill-sub-categories/{id}', [JobPostController::class, 'getSubCategoriesByCategory'])->name('get-sub-categories-by-category');


});


