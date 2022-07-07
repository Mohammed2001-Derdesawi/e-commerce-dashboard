<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\Attribute\Api\AttributeApiController;

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


    Route::name('attribute.')->prefix('/attributes')->group(function (){
        Route::get('/',[AttributeApiController::class,'index'])->name('index');
        Route::post('/store',[AttributeApiController::class,'store'])->name('store');
        Route::post('/delete/{id}',[AttributeApiController::class,'destroy'])->name('destroy');
        Route::post('/update/{id}',[AttributeApiController::class,'update'])->name('update');
        Route::get('/all',[AttributeApiController::class,'getall'])->name('getall');

    });

});
