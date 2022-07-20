<?php

use Modules\Admin\Http\Controllers\User\UserApiController;

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

Route::name('admin.')->prefix('/admin')->group(function (){

    // begin::User Routes
    Route::name('user')->group(function () {
        Route::get('/users', [UserApiController::class , 'index'])->name('index');
        Route::delete('/user/delete/{id}', [UserApiController::class , 'delete'])->name('delete');
        Route::get('/user/changeStatus/{id}', [UserApiController::class , 'changeStatus'])->name('changeStatus');
    });
    // end::User Routes
});
