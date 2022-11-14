<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Admin\SkillsController;
use App\Http\Controllers\Admin\JobPostController;

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

Route::post('/register-user',[CustomAuthController::class, 'registerAndRedirectClientAndFreelancer'])->name('api.front.register');
Route::post('/login-user',[CustomAuthController::class, 'loginAndRedirectClientAndFreelancer'])->name('api.front.login');
Route::get('/get-all-skills', [SkillsController::class,'getAllSkills'])->name('get-all-skills');
Route::get('/get-skill-sub-categories/{id}', [JobPostController::class, 'getSubCategoriesByCategory'])->name('get-sub-categories-by-category');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->as('api.')->group(function (){
    Route::get('/update-profile-info', [CustomAuthController::class, 'showUpdateProfileForm'])->name('profile-update-form');
});
