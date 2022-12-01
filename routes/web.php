<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\CustomAuthController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['as' => 'front.'], function (){
    Route::get('/', [FrontController::class, 'home'])->name('home');


    Route::get('/register-user/{user_type?}',[CustomAuthController::class, 'registerViewForClientAndFreelancer'])->name('register');
    Route::get('/login-user',[CustomAuthController::class, 'loginViewForClientAndFreelancer'])->name('login');
    Route::post('/register-user',[CustomAuthController::class, 'registerAndRedirectClientAndFreelancer'])->name('register');
    Route::post('/login-user',[CustomAuthController::class, 'loginAndRedirectClientAndFreelancer'])->name('login');

    Route::get('/user/view-profile/{id}', [FrontController::class, 'viewProfile'])->name('view-profile');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
