<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Admin\Api\AdminApiController;
use Modules\Admin\Http\Controllers\Authorzation\Api\RoleApiController;

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

    // Start Admin api
    Route::get('/getadmins',[AdminApiController::class,'getAdmins']);
    Route::post('/delete',[AdminApiController::class,'deleteAdmin']);
    Route::post('//changestaus/',[AdminApiController::class,'changeStatusAdmin']);
    Route::post('//store/',[AdminApiController::class,'store']);
    //End Admin Api

    // Start Roles Api

    Route::prefix('/roles')->group( function (){
        Route::get('/',[RoleApiController::class,'getRoles']);
        Route::get('/permissions',[RoleApiController::class,'getPermissions']);
        Route::post('/store',[RoleApiController::class,'storeRole']);
        Route::get('/get/admins',[RoleApiController::class,'getAdminsRole']);
        Route::post('admin/delete',[RoleApiController::class,'deleteAdminFormRole']);

    });


    // End Roles Api



});




