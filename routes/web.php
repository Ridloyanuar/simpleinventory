<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelangganController;
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
    Route::get('logout', [LoginController::class, 'logout']);

    //User
    Route::get('/user/new', [UserController::class, 'userNew']);
    Route::get('/user/all', [UserController::class, 'userAll']);
    Route::post('/user/store', [UserController::class, 'userStore']);


    //Pelanggan
    Route::get('/pelanggan/new', [PelangganController::class, 'pelangganNew']);
    Route::get('/pelanggan/all', [PelangganController::class, 'pelangganAll']);
    Route::post('/pelanggan/store', [PelangganController::class, 'pelangganStore']);
    


    //Supplier
    Route::get('/supplier/new', [SupplierController::class, 'supplierNew']);
    Route::get('/supplier/all', [SupplierController::class, 'supplierAll']);
    Route::post('/supplier/store', [SupplierController::class, 'supplierStore']);



    //Barang
    Route::get('/barang/new', [BarangController::class, 'barangNew']);
    Route::get('/barang/all', [BarangController::class, 'barangAll']);
    Route::post('/barang/store', [BarangController::class, 'barangStore']);



});


Route::get('/', [LoginController::class, 'show']);
Route::post('/auth', [LoginController::class, 'authenticate']);  
