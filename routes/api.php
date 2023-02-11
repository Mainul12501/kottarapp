<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Admin\SkillsController;
use App\Http\Controllers\Admin\JobPostController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\GigController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillsCategoryController;
use App\Http\Controllers\Admin\SkillsSubCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/check-exist-user',[CustomAuthController::class, 'checkExistUser'])->name('api.check-exist-user');
Route::post('/register-user',[CustomAuthController::class, 'registerAndRedirectClientAndFreelancer'])->name('api.front.register');
Route::post('/login-user',[CustomAuthController::class, 'loginAndRedirectClientAndFreelancer'])->name('api.front.login');
Route::get('/get-all-skills', [SkillsController::class,'getAllSkills'])->name('get-all-skills');
Route::get('/get-skill-sub-categories/{id}', [JobPostController::class, 'getSubCategoriesByCategory'])->name('get-sub-categories-by-category');
Route::get('/get-all-skill-categories', [SkillsCategoryController::class,'getAllSkillCategories'])->name('get-all-skill-categories');
Route::get('/get-all-skill-sub-categories', [SkillsSubCategoryController::class,'getAllSkillSubCategories'])->name('get-all-skill-categories');

Route::get('/user/view-profile/{id}', [FrontController::class, 'viewProfile'])->name('api.view-profile');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->as('api.')->group(function (){
    Route::get('/view-profile-info', [CustomAuthController::class, 'showUpdateProfileForm'])->name('profile-update-form');
    Route::post('/update-profile', [CustomAuthController::class, 'showUpdateProfile'])->name('update-profile');


    Route::prefix('client')->group(function (){
        Route::apiResource('/job-post', JobPostController::class);
        Route::post('/edit-project-gig-ajax', [JobPostController::class, 'editProjectGigAjax'])->name('edit-project-gig-ajax');
        Route::apiResource('projects', ProjectController::class);
        Route::get('/job-post-form', [JobPostController::class, 'create'])->name('job-post-form');
        Route::get('/job-post-edit/{id}', [JobPostController::class, 'edit'])->name('job-post-form');
        Route::get('/job-post-list', [JobPostController::class, 'userWiseJobPost'])->name('job-post-list'); // for client

        Route::post('/hire-student-for-job', [GigController::class, 'hireStudent'])->name('hire-student-for-job');
    });

    //    Frontend Freelancer section routes
    Route::prefix('freelancer')->group(function (){
        Route::get('/browse-all-gigs', [GigController::class, 'browseAllGigs'])->name('browse-all-gigs');
        Route::get('/gig-details/{slug}', [GigController::class, 'freelancerGigDetails'])->name('gig-details');
        Route::post('/apply-gig/{slug}', [GigController::class, 'applyGig'])->name('apply-gig');
        Route::get('/active-gigs', [GigController::class, 'studentActiveGigs'])->name('active-gigs');
    });
});
