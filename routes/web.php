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

Route::resource('/pasien', 'PasienController');
Route::get('/tabel/pasien/', 'PasienController@dataTable')->name('tabel.pasien');

Route::resource('/dokter', 'DocterController');
Route::get('/tabel/dokter/', 'DocterController@dataTable')->name('tabel.dokter');