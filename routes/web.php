<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;


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
Route::get('/test/{id}',function ($id){

    $user=User::find(1);

    $user->rate($id,3);
      dd($user->rates);
    // $user->rates()



});

?>
