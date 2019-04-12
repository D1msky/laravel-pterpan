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

Route::get('/login', 'AuthController@index')->name('login');

Route::get('/','HomeController@index');
Route::get('/mahasiswa','MahasiswaController@index');
Route::post('/mahasiswa/create', 'MahasiswaController@create');
Route::get('/mahasiswa/{id_mhs}/edit','MahasiswaController@edit');
Route::get('/mahasiswa/{id_mhs}/delete','MahasiswaController@delete');

Route::get('/users','UserController@index');

Route::get('/dosen','DosenController@index');
Route::get('/skripsi','SkripsiController@index');
Route::get('/catatan', 'SkripsiController@catatan');
Route::get('/statistik', 'PengajuanController@statistik');
Route::get('/pengajuan', 'PengajuanController@index');


Route::post('/auth', 'AuthController@postlogin');
Route::get('/logout','AuthController@logout');
