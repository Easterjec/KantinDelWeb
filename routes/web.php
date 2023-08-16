<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\MakananController;
use App\Http\Controllers\MinumanController;
use App\Http\Controllers\SnackController;
use App\Http\Controllers\PulsaController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PesanSnackController;
use App\Http\Controllers\PesanMakananController;
use App\Http\Controllers\PesanMinumanController;
use App\Http\Controllers\PesanPulsaController;
use App\Http\Controllers\PesanRuanganController;
use App\Http\Controllers\PemesananController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('makanan', MakananController::class);
Route::resource('minuman', MinumanController::class);
Route::resource('snack', SnackController::class);
Route::resource('pulsa', PulsaController::class);
Route::resource('ruangan',RuanganController::class);
Route::resource('pemesanan',PemesananController::class);
Route::get('/pesansnack', [App\Http\Controllers\PesanSnackController::class,'index'])->name('pesansnack');
Route::get('/pesanmakanan', [App\Http\Controllers\PesanmakananController::class,'index'])->name('pesanmakanan');
Route::get('/pesanminuman', [App\Http\Controllers\PesanminumanController::class,'index'])->name('pesanminuman');
Route::get('/pesanpulsa', [App\Http\Controllers\PesanpulsaController::class,'index'])->name('pesanpulsa');


Route::get('/pesanmakanan/Hapus/{id_pesanmakanan}', 'PesanMakananController@destroy');
Route::get('/pesanminuman/Hapus/{id_pesanminuman}', 'PesanminumanController@destroy');
Route::get('/pesansnack/Hapus/{id_pesansnack}', 'PesansnackController@destroy');
Route::get('/pesanpulsa/Hapus/{id_pesanpulsa}', 'PesanpulsaController@destroy');
Route::get('/pesanruangan/Hapus/{id_pesanruangan}', 'PesanruanganController@destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


