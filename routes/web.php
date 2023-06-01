<?php

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
// Route::namespace('App\Http\Controllers')->middleware('guest')->group(function () {
   
//     Route::get('/form',[TestController::class,'index'])->name('index');   
// });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'LoginController@login');
Route::get('/register', 'RegisterController@index');
Route::post('/register/actregister', 'RegisterController@actregister');

Route::get('/logout', 'LoginController@logout');



Route::group(['middleware' => ['auth', 'check.role:admin']], function() {
    Route::get('/barang', 'BarangController@index');
    Route::get('/barang/create', 'BarangController@create');
    Route::post('/barang', 'BarangController@store');
    Route::get('/barang/{id}/edit', 'BarangController@edit');
    Route::put('/barang/update/{id}', 'BarangController@update');
    Route::get('/barang/{id}/destroy', 'BarangController@destroy');
    Route::post('/supplier/import', 'BarangController@import');

    Route::get('/user', 'UserController@index');
    Route::post('/user-create', 'UserController@store');
    Route::post('/user/{id}/update', 'UserController@update');
    Route::get('/user/{id}/destroy', 'UserController@destroy');
});

Route::group(['middleware' => ['auth','check.role:kasir,admin']], function() {
    Route::get('/dashboard', 'DashboardController@index');
    Route::get('/dashboard/penjualan', 'DashboardController@penjualan');
    Route::get('/dashboard/profit', 'DashboardController@profit');
    Route::get('/dashboard/supplier', 'DashboardController@supplier');
    Route::get('/dashboard/barang', 'DashboardController@barang');

    Route::get('/profile', 'UserController@profile');
    Route::post('/profile', 'UserController@update_profile');
    Route::post('/updatepassword', 'UserController@update_password');

    Route::get('/penjualan/{kode_penjualan}', 'PenjualanController@index');
    Route::post('/penjualan', 'PenjualanController@store');
    Route::get('/penjualan/tambah_qty/{id_penjualan}', 'PenjualanController@tambah_qty');
    Route::get('/penjualan/kurangi_qty/{id_penjualan}', 'PenjualanController@kurangi_qty');
    Route::get('/penjualan/hapus/{id_penjualan}', 'PenjualanController@hapus');
    Route::post('/penjualan/simpan_transaksi', 'PenjualanController@simpan_transaksi');
    Route::get('/penjualan/struk/{kode_penjualan}', 'PenjualanController@struk');
    Route::get('/penjualan/penjualanjasa/{kode_penjualan}', 'PenjualanController@penjualanjasa');

    Route::get('/laporan', 'LaporanController@index');
    Route::get('/laporan/pdf', 'LaporanController@pdf');
    Route::post('/laporan/pertanggal', 'LaporanController@pertanggal');
});
