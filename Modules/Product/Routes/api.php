<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\Brand\Api\BrandApiController;
use Modules\Product\Http\Controllers\Product\Api\ProductApiController;
use Modules\Product\Http\Controllers\Category\Api\CategoryApiController;
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

    // begin::Attribute Routes
    Route::name('attribute.')->prefix('/attributes')->group(function (){
        Route::get('/',[AttributeApiController::class,'index'])->name('index');
        Route::post('/store',[AttributeApiController::class,'store'])->name('store');
        Route::post('/delete/{id}',[AttributeApiController::class,'destroy'])->name('destroy');
        Route::post('/update/{id}',[AttributeApiController::class,'update'])->name('update');
        Route::get('/all',[AttributeApiController::class,'getall'])->name('getall');

    });
        // End::Attribute Routes


     // begin::Brand Routes
     Route::name('brand')->group(function () {
        Route::get('/brands', [BrandApiController::class , 'index'])->name('index');
        Route::post('/brand/create', [BrandApiController::class , 'store'])->name('store');
        Route::delete('/brand/delete/{id}', [BrandApiController::class , 'destroy'])->name('delete');
        Route::post('/brand/update/{id}', [BrandApiController::class , 'update'])->name('update');
    });
    // end::Brand Routes

     // begin::Category Routes
     Route::get('/categories', [CategoryApiController::class , 'index'])->name('index');

     //End::Categorie Route


    // begin::Product Routes
    Route::name('products.')->prefix('/products')->group(function () {
        Route::get('/', [ProductApiController::class , 'index'])->name('index');
        Route::post('/store', [ProductApiController::class , 'store'])->name('store');
        Route::post('/update', [ProductApiController::class , 'update'])->name('update');
        Route::post('/images/info', [ProductApiController::class , 'getFilesInfo'])->name('getimages');

    });
    // end::Product Routes



});
