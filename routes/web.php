<?php

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

Route::get('/admin/laporan/excel', 'PetugasController@excel');

Route::get('/admin/anggota/carianggota', 'AnggotaController@search');
Route::resource('/admin/anggota', 'AnggotaController');

Route::get('/admin/simpanan/carisimpanan', 'SimpananController@search');
Route::resource('/admin/simpanan', 'SimpananController');

Route::get('/admin/angsuran/cariangsuran', 'AngsuranController@search');
Route::resource('/admin/angsuran', 'AngsuranController');

Route::get('/admin/kategoripinjaman/carikategori', 'KategoriController@search');
Route::resource('/admin/kategoripinjaman', 'KategoriController');


Route::resource('/admin/pinjaman', 'PinjamanController');

Route::get('/admin/caripetugas', 'PetugasController@search');
Route::get('petugas/laporan/excel', 'PetugasController@excel');

Auth::routes();
Route::resource('/admin', 'PetugasController');
Route::get('/home', 'HomeController@index')->name('home');
