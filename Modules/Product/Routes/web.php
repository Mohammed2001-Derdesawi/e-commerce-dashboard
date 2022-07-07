<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\Attribute\AttributeController;
use Modules\Product\Http\Controllers\Product\ProductController;

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

Route::name('admin.')->prefix('/admin//')->middleware('admin')->group(function() {


    Route::name('product.')->prefix('/products')->group(function (){
        Route::get('/create',[ProductController::class,'create'])->name('create');

    });


    Route::name('attribute.')->prefix('/attributes')->group(function (){
        Route::get('/',[AttributeController::class,'index'])->name('index');

    });

});
