<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\Attribute\AttributeController;
use Modules\Product\Http\Controllers\Product\ProductController;

use Modules\Product\Http\Controllers\Brand\BrandController;
use Modules\Product\Http\Controllers\Category\CategoryController;

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


     // begin::Category Routes
     Route::name('category.')->group(function () {
        Route::get('categories', [CategoryController::class , 'index'])->name('index');
        Route::get('category/create', [CategoryController::class , 'create'])->name('create');
        Route::post('category/create', [CategoryController::class , 'store'])->name('store');
        Route::get('category/{id}/edit', [CategoryController::class , 'edit'])->name('edit');
        Route::post('category/{id}/edit', [CategoryController::class , 'update'])->name('update');
        Route::get('category/delete/{id}', [CategoryController::class , 'destroy'])->name('delete');
    });
    // end::Category Routes


    // begin::Brand Routes
    Route::name('brand.')->group(function () {
        Route::get('brands', [BrandController::class , 'index'])->name('index');
        Route::get('brand/create', [BrandController::class , 'create'])->name('create');
        Route::get('brand/{id}/edit', [BrandController::class , 'edit'])->name('edit');
    });
    // end::Brand Routes





});



