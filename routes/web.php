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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');





Route::resource('/reseller', 'resellercontroller')->except([
	'store'
])->middleware('can:isreseller');
Route::post('/reseller', 'resellercontroller@addproduk')->name('addproduk')->middleware('can:isreseller');
Route::get('/reseller/hapus/{hapus}', 'resellercontroller@hapuspro')->name('reseller.hapus')
->middleware('can:isreseller');
Route::get('/transaksi', 'resellercontroller@transaksi')->name('transaksiR')
->middleware('can:isreseller');
Route::post('/transaksi', 'resellercontroller@addtrans')->name('addtrans')
->middleware('can:isreseller');
Route::post('/reseller/search', 'resellercontroller@rsearch')->name('rsearch')
->middleware('can:isreseller');
Route::post('/reseller/konfirm', 'resellercontroller@rkonfirm')->name('rkonfirm')
->middleware('can:isreseller');


Route::resource('admin', 'admincontroller')->middleware('can:isadmin');
Route::post('/admin/aktivasi', 'admincontroller@aktivasi')
->name('admin.aktivasi')->middleware('can:isadmin');
Route::post('admin.produk/search','admincontroller@psearch')
->name('produk_search')->middleware('can:isadmin');
Route::get('admin.produk','admincontroller@proindex')->name('produk_show')->middleware('can:isadmin');
Route::get('admin.transaksi','admincontroller@traindex')->name('transaksi_show')->middleware('can:isadmin');
Route::post('admin.transaksi/kirim','admincontroller@trakirim')->name('transaksi_kirim')->middleware('can:isadmin');



Route::get('owner/index', 'ownercontroller@index')->middleware('can:isowner')->name('owner.index');
Route::get('owner/transaksi/{bulan}', 'ownercontroller@transaksi')->middleware('can:isowner')->name('owner.transaksi');
Route::get('owner/export', 'ownercontroller@export_excel')->middleware('can:isowner')->name('owner.export');
Route::post('/owner/aktivasi', 'ownercontroller@aktivasi')
->name('owner.aktivasi')->middleware('can:isowner');