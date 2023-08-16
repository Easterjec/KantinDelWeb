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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login','App\Http\Controllers\Api\UserController@login');
Route::post('registrasi','App\Http\Controllers\Api\UserController@register');

Route::get('makanan', 'App\Http\Controllers\Api\MakananController@index');
Route::post('pesanmakanan', 'App\Http\Controllers\Api\PemesananMakananController@store');
Route::get('pesanmakanan/user/{id}', 'App\Http\Controllers\Api\PemesananMakananController@history');

Route::get('minuman', 'App\Http\Controllers\Api\MinumanController@index');
Route::post('pesanminuman', 'App\Http\Controllers\Api\PemesananMinumanController@store');
Route::get('pesanminuman/user/{id}', 'App\Http\Controllers\Api\PemesananMinumanController@history');

Route::get('/snack', 'App\Http\Controllers\Api\SnackController@index');
Route::put('/snack/updatestok/{id}', 'App\Http\Controllers\Api\SnackController@updatestok');
Route::post('pesansnack', 'App\Http\Controllers\Api\PemesananSnackController@store');
Route::get('pesansnack/user/{id}', 'App\Http\Controllers\Api\PemesananSnackController@history');

Route::get('pulsa', 'App\Http\Controllers\Api\PulsaController@index');
