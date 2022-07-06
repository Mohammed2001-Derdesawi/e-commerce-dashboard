<?php

use Illuminate\Http\Request;
use Modules\Product\Http\Controllers\Brand\Api\BrandApiController;

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

Route::prefix('/admin')->name('admin.')->group(function() {
    
    // begin::Brand Routes
    Route::name('brand')->group(function () {
        Route::get('/brands', [BrandApiController::class , 'index'])->name('index');
        Route::post('/brand/create', [BrandApiController::class , 'store'])->name('store');
        Route::delete('/brand/delete/{id}', [BrandApiController::class , 'destroy'])->name('delete');
        Route::post('/brand/update/{id}', [BrandApiController::class , 'update'])->name('update');
    });
    // end::Brand Routes
    
});