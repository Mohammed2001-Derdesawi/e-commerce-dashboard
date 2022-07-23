<?php

use Illuminate\Support\Facades\Route;
use Modules\Order\Http\Controllers\Order\OrderController;

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

Route::prefix('/admin/orders')->middleware('admin')->name('admin.orders.')->group(function() {
    Route::get('/', [OrderController::class,'index'])->name('index');
    Route::get('/show/{id}',[OrderController::class,'show'])->name('show');
    Route::get('/test',[OrderController::class,'test']);
});
