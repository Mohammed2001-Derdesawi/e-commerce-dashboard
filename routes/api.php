<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\Rate\Api\RateApiController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::name('user.')->middleware('web')->group(function (){
     //Start Rate Routes
     Route::name('rates.')->prefix('/rates')->group(function () {
        Route::post('/store/{id}', [RateApiController::class , 'store'])->name('store'); // Entity id
        Route::post('/update/{id}', [RateApiController::class , 'update'])->name('update'); // Entity id
        Route::post('/delete/{id}', [RateApiController::class , 'userdelete'])->name('delete'); // Rate id


    });
    //End Rate Routes


});
