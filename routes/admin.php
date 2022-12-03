<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\SettingsController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CustomAuthUserViewController;

use App\Http\Controllers\Admin\SkillsCategoryController;
use App\Http\Controllers\Admin\SkillsSubCategoryController;
use App\Http\Controllers\Admin\JobPostController;
use App\Http\Controllers\Admin\SkillsController;
use App\Http\Controllers\Admin\JobPostQuestionController;
use App\Http\Controllers\Admin\ProjectController;

use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Front\GigController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

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

//        Route::get('/approve-job', [JobPostController::class, 'approveJob'])->name('approve-job');
    });

//    Frontend client section routes
    Route::prefix('client')->as('client.')->group(function (){
//        job post crud
        Route::resource('job-post', JobPostController::class);
        Route::resource('projects', ProjectController::class);
        Route::get('/job-post-list', [JobPostController::class, 'userWiseJobPost'])->name('job-post-list');
        Route::get('/client-dashboard', [CustomAuthUserViewController::class, 'authUserDashboard'])->name('dashboard');

        Route::post('/hire-student-for-job', [GigController::class, 'hireStudent'])->name('hire-student-for-job');
    });

//    Frontend Freelancer section routes
    Route::prefix('freelancer')->as('freelancer.')->group(function (){
        Route::get('/browse-all-gigs', [GigController::class, 'browseAllGigs'])->name('browse-all-gigs');
        Route::get('/gig-details/{slug}', [GigController::class, 'freelancerGigDetails'])->name('gig-details');
        Route::post('/apply-gig/{slug}', [GigController::class, 'applyGig'])->name('apply-gig');
        Route::get('/active-gigs', [GigController::class, 'studentActiveGigs'])->name('active-gigs');

        Route::get('/decline-gig-offer/{id}', [GigController::class, 'declineGigOffer'])->name('decline-gig-offer');
    });

    Route::get('/get-skill-sub-categories/{id}', [JobPostController::class, 'getSubCategoriesByCategory'])->name('get-sub-categories-by-category');
    Route::get('/view-profile-info', [CustomAuthController::class, 'showUpdateProfileForm'])->name('profile-update-form');
    Route::post('/update-profile', [CustomAuthController::class, 'showUpdateProfile'])->name('update-profile');


});


