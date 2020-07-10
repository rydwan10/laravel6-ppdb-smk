<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'CalonSiswaController@dashboard')->name('dashboard');
    Route::get('/ppdb/data', 'CalonSiswaController@datatable')->name('datatable');
    Route::get('/asal_sekolah/data', 'AsalSekolahController@datatable')->name('datatable.asal_sekolah');
    Route::get('/asal_sekolah/data2', 'AsalSekolahController@datatable2')->name('datatable2.asal_sekolah');
    Route::resource('asal_sekolah', 'AsalSekolahController');
    Route::resource('ppdb', 'CalonSiswaController');
    Route::get('/ppdb/{id}/print', 'CalonSiswaController@printPDF')->name('print.siswa');
    Route::get('/ppdb/download/excel', 'CalonSiswaController@printExcel');
});

// Route::get('/home', 'HomeController@index')->name('home');
