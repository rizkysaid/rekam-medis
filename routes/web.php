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
    return redirect('dashboard');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


Route::resource('/pasien', 'PasienController');
Route::get('/tabel/pasien/', 'PasienController@dataTable')->name('tabel.pasien');


Route::resource('/dokter', 'DocterController');
Route::get('/tabel/dokter/', 'DocterController@dataTable')->name('tabel.dokter');


Route::resource('/pendaftaran', 'PendaftaranController');
/*Route::get('/tabel/pendaftaran', 'PendaftaranController@tblPendaftaran')->name('tabel.pendaftaran');
*/
Route::resource('/pemeriksaan', 'PemeriksaanController');
Route::get('/tabel/pemeriksaan', 'PemeriksaanController@tblpemeriksaan')->name('tabel.pemeriksaan');

Route::resource('/diagnosa', 'DiagnosaController');
Route::get('/diagnosa/{id}/get', 'DiagnosaController@tblDiagnosa')->name('tabel.diagnosa');

Route::get('/laporan', 'LaporanController@index')->name('laporan.index');
Route::get('/laporan/kunjungan', 'LaporanController@kunjungan')->name('laporan.kunjungan');
Route::get('/laporan/print_kunjungan', 'LaporanController@print_kunjungan')->name('print.kunjungan');