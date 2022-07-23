<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\Cart\Api\CartApiController;
use Modules\Product\Http\Controllers\WishList\Api\WishListApiController;
use Modules\Product\Http\Controllers\Rate\RateController;
use Modules\Product\Http\Controllers\Commnet\CommnetController;
use Modules\Product\Http\Controllers\Rate\Api\RateApiController;
use Modules\Product\Http\Controllers\Brand\Api\BrandApiController;
use Modules\Product\Http\Controllers\Comment\Api\CommentApiController;
use Modules\Product\Http\Controllers\Commnet\Api\CommnetApiController;
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
     Route::name('brand.')->group(function () {
        Route::get('/brands', [BrandApiController::class , 'index'])->name('index');
        Route::post('/brand/create', [BrandApiController::class , 'store'])->name('store');
        Route::delete('/brand/delete/{id}', [BrandApiController::class , 'destroy'])->name('delete');
        Route::post('/brand/update/{id}', [BrandApiController::class , 'update'])->name('update');
        Route::get('/brands/all', [BrandApiController::class , 'brands'])->name('brands');
    });
    // end::Brand Routes

     // begin::Category Routes
     Route::name('categories.')->prefix('/categories')->group(function () {
     Route::get('/', [CategoryApiController::class , 'index'])->name('index');
     });

     //End::Categorie Route


    // begin::Product Routes
    Route::name('products.')->prefix('/products')->group(function () {
        Route::get('/', [ProductApiController::class , 'index'])->name('index');
        Route::post('/store', [ProductApiController::class , 'store'])->name('store');
        Route::post('/update', [ProductApiController::class , 'update'])->name('update');
        Route::post('/images/info', [ProductApiController::class , 'getFilesInfo'])->name('getimages');
    });
    // end::Product Routes


    //Start Rate Routes
    Route::name('rates.')->prefix('/rates')->group(function () {
        Route::get('/', [RateApiController::class , 'index'])->name('index');
        Route::post('/delete/{id}', [RateApiController::class , 'destroy'])->name('delete');

    });
    //End Rate Routes


    //Start Comment Routes
    Route::name('commnets.')->prefix('/comments')->group(function () {
        Route::get('/', [CommentApiController::class , 'index'])->name('index');
        Route::post('/delete/{id}', [CommentApiController::class , 'destroy'])->name('delete');

    });
    //End Commnet Routes


});



// begin::Cart Routes
Route::get('/add-to-cart/{id}', [CartApiController::class , 'store'])->name('store');
Route::get('/delete-from-cart/{id}', [CartApiController::class , 'destroy'])->name('delete');
// end::Cart Routes

// begin::WishList Routes
Route::get('/add-to-wishList/{id}', [WishListApiController::class , 'store'])->name('store');
Route::get('/delete-from-wishList/{id}', [WishListApiController::class , 'destroy'])->name('delete');
// end::WishList Routes






