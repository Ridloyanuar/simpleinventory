<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
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
Route::middleware(['auth'])->group(function (){
    Auth::routes();
    Route::get('/logout', [LoginController::class, 'logout']);

    //User
    Route::get('/user/new', [UserController::class, 'userNew']);
    Route::get('/user/all', [UserController::class, 'userAll']);
    Route::post('/user/store', [UserController::class, 'userStore']);
    Route::delete('/user/delete/{id}', [UserController::class, 'userDelete']);
    Route::put('/user/update/{id}', [UserController::class, 'userUpdate']);
    Route::get('/user/edit/{id}', [UserController::class, 'userEdit']);


    //Pelanggan
    Route::get('/pelanggan/new', [PelangganController::class, 'pelangganNew']);
    Route::get('/pelanggan/all', [PelangganController::class, 'pelangganAll']);
    Route::post('/pelanggan/store', [PelangganController::class, 'pelangganStore']);
    Route::delete('/pelanggan/delete/{id}', [PelangganController::class, 'pelangganDelete']);
    Route::put('/pelanggan/update/{id}', [PelangganController::class, 'pelangganUpdate']);
    Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'pelangganEdit']);

    //Supplier
    Route::get('/supplier/new', [SupplierController::class, 'supplierNew']);
    Route::get('/supplier/all', [SupplierController::class, 'supplierAll']);
    Route::post('/supplier/store', [SupplierController::class, 'supplierStore']);
    Route::delete('/supplier/delete/{id}', [SupplierController::class, 'supplierDelete']);
    Route::put('/supplier/update/{id}', [SupplierController::class, 'supplierUpdate']);
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'supplierEdit']);

    //Barang
    Route::get('/barang/new', [BarangController::class, 'barangNew']);
    Route::get('/barang/all', [BarangController::class, 'barangAll']);
    Route::post('/barang/store', [BarangController::class, 'barangStore']);
    Route::delete('/barang/delete/{id}', [BarangController::class, 'barangDelete']);
    Route::put('/barang/update/{id}', [BarangController::class, 'barangUpdate']);
    Route::get('/barang/edit/{id}', [BarangController::class, 'barangEdit']);

    //Pembelian
    Route::get('/pembelian/new', [PembelianController::class, 'pembelianNew']);
    Route::get('/pembelian/all', [PembelianController::class, 'pembelianAll']);
    Route::post('/pembelian/store', [PembelianController::class, 'pembelianStore']);
    Route::delete('/pembelian/delete/{kode}', [PembelianController::class, 'pembelianDelete']);


    //Penjualan
    Route::get('/penjualan/new', [PenjualanController::class, 'penjualanNew']);
    Route::get('/penjualan/all', [PenjualanController::class, 'penjualanAll']);
    Route::post('/penjualan/store', [PenjualanController::class, 'penjualanStore']);
    Route::delete('/penjualan/delete/{kode}', [PenjualanController::class, 'penjualanDelete']);


    //Laporan Mutasi Stok
    Route::get('/mutasi/new', [UserController::class, 'mutasiNew']);
    Route::post('/mutasi/new', [UserController::class, 'mutasiNew']);

    //Laporan Mutasi Stok Keluar
    Route::get('/mutasikeluar/new', [UserController::class, 'mutasiKeluarNew']);
    Route::post('/mutasikeluar/new', [UserController::class, 'mutasiKeluarNew']);

});


Route::get('/', [LoginController::class, 'show']);
Route::get('/login', [LoginController::class, 'show']);
Route::post('/auth', [LoginController::class, 'authenticate']);  
// Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/getBarang/{id}', [PembelianController::class, 'getBarang']);
