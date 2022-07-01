<?php

use Modules\Product\Entities\Category;
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

Route::prefix('admin')->name('category.')->group(function() {
    
    Route::middleware('admin')->group(function (){
        Route::get('categories', [CategoryController::class , 'index'])->name('index');
        Route::get('category/create', [CategoryController::class , 'create'])->name('create');
        Route::post('category/create', [CategoryController::class , 'store'])->name('store');
        Route::get('category/{id}/edit', [CategoryController::class , 'edit'])->name('edit');
        Route::post('category/{id}/edit', [CategoryController::class , 'update'])->name('update');
        Route::get('category/delete/{id}', [CategoryController::class , 'destroy'])->name('delete');
    });
});


Route::get('/test', function () {
    $sub = Category::where('id' , 3)->with('parent')->get();
    dd($sub);
});
