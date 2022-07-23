<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Admin\AdminController;
use Modules\Admin\Http\Controllers\Authentication\AdminLoginController;
use Modules\Admin\Http\Controllers\Authorzation\RoleController;
use Modules\Admin\Http\Controllers\Dashboard\AdminHomeController;
use Modules\Admin\Http\Controllers\Authentication\ResetPasswordController;
use Modules\Admin\Http\Controllers\User\UserController;

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


        // begin::User Routes
        Route::name('user.')->group(function () {
            Route::get('/users', [UserController::class , 'index'])->name('index');
        });
            // end::User Routes

         //Start Admin Pages Controller
      Route::get('/admins', [AdminController::class,'index'])->name('index');
      Route::get('/edit/email={email}', [AdminController::class,'edit'])->name('edit');
    //   Route::get('/delete/email={email}', [AdminController::class,'deleteAdmin'])->name('delete');
      Route::post('/update/password/email={email}', [AdminController::class,'updateadminPassword'])->name('updateadmipassword'); //Admin can edit password  that  belongs to another admin
      Route::post('/update/email/email={email}', [AdminController::class,'updateadmiEmail'])->name('updateadminemail'); // Admin can edit email  that  belongs to another admin
      Route::post('/update/base/info/{email}/', [AdminController::class,'updatemainDetails'])->name('update.base.info'); // Admin can edit main info that  belongs to another admin
         //End  Admin Pages Controller


         // Start Authorization Routes

         Route::prefix('/roles')->group(function (){
            Route::get('/',[RoleController::class,'index'])->name('roles');

            Route::get('/edit/{role}',[RoleController::class,'edit'])->name('roles.edit');
            Route::get('/show/{role}',[RoleController::class,'show'])->name('roles.show');
            Route::post('/update/{role}',[RoleController::class,'update'])->name('roles.update');
            Route::post('/delete/{role}',[RoleController::class,'destroy'])->name('roles.delete');
            // Route::post('/delete/{role}',[RoleController::class,'update'])->name('roles.delete');

         });


         //End Authorization Routes

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









