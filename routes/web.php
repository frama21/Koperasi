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

Route::get('/admin/anggota/carianggota', 'AnggotaController@search');
Route::resource('/admin/anggota', 'AnggotaController');

Route::resource('/admin/simpanan', 'SimpananController');

Route::resource('/admin/angsuran', 'AngsuranController');
Route::resource('/admin/kategoripinjaman', 'KategoriController');
Route::resource('/admin/pinjaman', 'PinjamanController');


Auth::routes();
Route::resource('/admin', 'PetugasController');
Route::get('/home', 'HomeController@index')->name('home');
