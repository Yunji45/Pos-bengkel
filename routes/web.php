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
    // Route::get('/home', 'UserController@home');
    Route::get('/supplier', 'SupplierController@index');
    Route::post('/supplier', 'SupplierController@store');
    Route::post('/supplier/{id}/update', 'SupplierController@update');
    Route::get('/supplier/{id}/destroy', 'SupplierController@destroy');

    Route::get('/barang', 'BarangController@index');
    Route::get('/barang/create', 'BarangController@create');
    Route::post('/barang', 'BarangController@store');
    Route::get('/barang/{id}/edit', 'BarangController@edit');
    Route::put('/barang/update/{id}', 'BarangController@update');
    Route::get('/barang/{id}/destroy', 'BarangController@destroy');
    Route::post('/supplier/import', 'BarangController@import');

    Route::get('/jasa-service', 'ServiceController@index')->name('service');
    Route::get('/jasa/create', 'ServiceController@create')->name('create');
    Route::post('/jasa/store', 'ServiceController@store')->name('store');
    Route::get('/jasa/{id}/edit', 'ServiceController@edit')->name('edit');
    Route::put('/jasa/update/{id}', 'ServiceController@update')->name('update');
    Route::get('/jasa/{id}/delete', 'ServiceController@destroy')->name('hapus');

    Route::get('/user', 'UserController@index');
    Route::post('/user-create', 'UserController@store');
    Route::post('/user/{id}/update', 'UserController@update');
    Route::get('/user/{id}/destroy', 'UserController@destroy');

    Route::resource('/akun','AkunController');
    Route::post('/akun', 'AkunController@store');
    Route::get('/akun/edit/{id}','AkunController@edit');
    Route::get('/akun/hapus/{id}', 'AkunController@destroy');

    Route::resource('/jurnal','JurnalController');
    Route::post('/jurnal', 'JurnalController@store');
    Route::get('/jurnal/edit/{id}','JurnalController@edit');
    Route::get('/jurnal/hapus/{id}', 'JurnalController@destroy');
    Route::get('/jurnalcetak/cetak_pdf', 'JurnalController@cetak_pdf');

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

Route::group(['middleware'=>['auth','check.role:customer']],function (){
    Route::get('/customer', 'CustomerController@index');
    Route::post('/act', 'CustomerController@store');
    Route::get('/create-antrian','CustomerController@create');
    Route::get('/cetak','CustomerController@cetakantrian');
});