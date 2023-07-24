<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('dashboard');
});


Route::group(['middleware' => 'auth'], function(){


    Route::resource('kategori', KategoriController::class);
    Route::get('/kategorisearch', [KategoriController::class, 'search']);




    Route::resource('barang', BarangController::class);
    Route::get('/search', [BarangController::class, 'search']);


    Route::resource('merek', MerekController::class);
    Route::get('/cari', [MerekController::class, 'cari']);


    Route::resource('barangmasuk', BarangMasukController::class);

    Route::resource('barangkeluar', BarangKeluarController::class);
    Route::get('/barangkeluarsearch', [BarangKeluarController::class, 'search']);



    Route::resource('supplier', SupplierController::class);






});
