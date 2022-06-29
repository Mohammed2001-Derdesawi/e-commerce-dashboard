<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Authorzation\RoleController;
use Modules\Admin\Http\Controllers\Dashboard\AdminHomeController;
use Modules\Admin\Http\Controllers\Authentication\AdminLoginController;
use Modules\Admin\Http\Controllers\Authentication\ResetPasswordController;

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

Route::prefix('admin')->name('admin.')->group(function() {

    Route::middleware('admin')->group(function (){
     // Dahsboard Controller
      Route::get('/', [AdminHomeController::class,'index'])->name('dashboard');
     // End Dashboard Controller
    });

    // Authentication Routes
    Route::get('/login',[AdminLoginController::class,'showloginForm'])->name('showloginform');
    Route::post('/login',[AdminLoginController::class,'login'])->name('login');
    Route::post('/logout',[AdminLoginController::class,'logout'])->name('logout');
    Route::get('/forget-password',[AdminLoginController::class,'forgetPassword'])->name('forgetPassword');
    Route::post('/forget-password',[AdminLoginController::class,'checkEmailForgetPassword'])->name('checkEmailForgetPassword');


    Route::get('/reset-password/{token}',[ResetPasswordController ::class,'showResetPassword'])->name('showResetPassword');
    Route::post('/reset-password',[ResetPasswordController ::class,'updatePassword'])->name('updatePassword');
    //  End Authentication Routes

});

