<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//Route::resource('my_users', App\Http\Controllers\API\MyUserAPIController::class);
//Route::resource('epreuves', App\Http\Controllers\API\EpreuveAPIController::class);
//Route::resource('corrections', App\Http\Controllers\API\CorrectionAPIController::class);
