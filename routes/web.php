<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\HomeController;
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

//Admin
Route::get('/', [HomeController::class, 'index']);
Route::get('/login/admin', [LoginController::class, 'show'])->name('login/admin');
Route::post('/auth', [LoginController::class, 'authenticate']);

Route::middleware('auth:admin')->prefix('/admin')->group(function (){
    Auth::routes();
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    //User
    Route::get('/user/new', [UserController::class, 'userNew'])->name('admin.user.new');
    Route::get('/user/all', [UserController::class, 'userAll'])->name('admin.user.all');
    Route::post('/user/store', [UserController::class, 'userStore'])->name('admin.user.store');
    Route::delete('/user/delete/{id}', [UserController::class, 'userDelete'])->name('admin.user.delete');
    Route::put('/user/update/{id}', [UserController::class, 'userUpdate'])->name('admin.user.update');
    Route::get('/user/edit/{id}', [UserController::class, 'userEdit'])->name('admin.user.edit');


    //Pelanggan
    Route::get('/pelanggan/new', [PelangganController::class, 'pelangganNew'])->name('admin.pelanggan.new');
    Route::get('/pelanggan/all', [PelangganController::class, 'pelangganAll'])->name('admin.pelanggan.all');
    Route::post('/pelanggan/store', [PelangganController::class, 'pelangganStore'])->name('admin.pelanggan.store');
    Route::delete('/pelanggan/delete/{id}', [PelangganController::class, 'pelangganDelete'])->name('admin.pelanggan.delete');
    Route::put('/pelanggan/update/{id}', [PelangganController::class, 'pelangganUpdate'])->name('admin.pelanggan.update');
    Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'pelangganEdit'])->name('admin.pelanggan.edit');

    //Supplier
    Route::get('/supplier/new', [SupplierController::class, 'supplierNew'])->name('admin.supplier.new');
    Route::get('/supplier/all', [SupplierController::class, 'supplierAll'])->name('admin.supplier.all');
    Route::post('/supplier/store', [SupplierController::class, 'supplierStore'])->name('admin.supplier.store');
    Route::delete('/supplier/delete/{id}', [SupplierController::class, 'supplierDelete'])->name('admin.supplier.delete');
    Route::put('/supplier/update/{id}', [SupplierController::class, 'supplierUpdate'])->name('admin.supplier.update');
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'supplierEdit'])->name('admin.supplier.edit');

    //Barang
    Route::get('/barang/new', [BarangController::class, 'barangNew'])->name('admin.barang.new');
    Route::get('/barang/all', [BarangController::class, 'barangAll'])->name('admin.barang.all');
    Route::post('/barang/store', [BarangController::class, 'barangStore'])->name('admin.barang.store');
    Route::delete('/barang/delete/{id}', [BarangController::class, 'barangDelete'])->name('admin.barang.delete');
    Route::put('/barang/update/{id}', [BarangController::class, 'barangUpdate'])->name('admin.barang.update');
    Route::get('/barang/edit/{id}', [BarangController::class, 'barangEdit'])->name('admin.barang.edit');

    //Pembelian
    Route::get('/pembelian/new', [PembelianController::class, 'pembelianNew'])->name('admin.pembelian.new');
    Route::get('/pembelian/all', [PembelianController::class, 'pembelianAll'])->name('admin.pembelian.all');
    Route::post('/pembelian/store', [PembelianController::class, 'pembelianStore'])->name('admin.pembelian.store');
    Route::delete('/pembelian/delete/{kode}', [PembelianController::class, 'pembelianDelete'])->name('admin.pembelian.delete');


    //Penjualan
    Route::get('/penjualan/new', [PenjualanController::class, 'penjualanNew'])->name('admin.penjualan.new');
    Route::get('/penjualan/all', [PenjualanController::class, 'penjualanAll'])->name('admin.penjualan.all');
    Route::post('/penjualan/store', [PenjualanController::class, 'penjualanStore'])->name('admin.penjualan.store');
    Route::delete('/penjualan/delete/{kode}', [PenjualanController::class, 'penjualanDelete'])->name('admin.penjualan.delete');


    //Laporan Mutasi Stok
    Route::get('/mutasi/new', [UserController::class, 'mutasiNew'])->name('admin.mutasi.stok.new');
    Route::post('/mutasi/new', [UserController::class, 'mutasiNew'])->name('admin.mutasi.stok.new.post');

    //Laporan Mutasi Stok Keluar
    Route::get('/mutasikeluar/new', [UserController::class, 'mutasiKeluarNew'])->name('admin.mutasikeluar.new');
    Route::post('/mutasikeluar/new', [UserController::class, 'mutasiKeluarNew'])->name('admin.mutasikeluar.new.post');

});

//Customer

Route::middleware('auth:customer')->prefix('/customer')->group(function (){
 
});

Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);

Route::get('/getBarang/{id}', [PembelianController::class, 'getBarang']);
