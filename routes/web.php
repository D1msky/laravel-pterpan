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

Route::group(['middleware' => ['auth','checkRole:Admin']],function(){
    Route::get('/mahasiswa','MahasiswaController@index');
    Route::post('/mahasiswa/create', 'MahasiswaController@create');
    Route::get('/mahasiswa/{id_mhs}/edit','MahasiswaController@edit');
    Route::get('/mahasiswa/{id_mhs}/delete','MahasiswaController@delete');
    Route::post('/mahasiswa/{id_mhs}/update' ,'MahasiswaController@update');

    Route::get('/dosen','DosenController@index');
    Route::get('/dosen/{id_dosen}/edit' ,'DosenController@edit');
    Route::get('/dosen/{id_dosen}/delete' ,'DosenController@delete');
    Route::post('/dosen/create','DosenController@create');
    Route::post('/dosen/{id_dosen}/update','DosenController@update');

    Route::get('/users','UserController@index');
});


Route::group(['middleware' => ['auth','checkRole:Admin,Kaprodi']],function(){
    Route::get('/statistik', 'PengajuanController@statistik');
});

Route::group(['middleware' => ['auth','checkRole:Dosen']],function(){
    Route::post('/detail_skripsi/create','Detail_SkripsiController@create');
});

Route::group(['middleware' => ['auth','checkRole:Admin,Dosen,Mahasiswa']],function(){
    Route::get('/pengajuan' ,'PengajuanController@index');
    
    Route::post('/pengajuan/create' ,'PengajuanController@create');
    Route::get('/pengajuan/{id_pengajuan}/edit','PengajuanController@edit');
    Route::post('/pengajuan/{id_pengajuan}/update','PengajuanController@update');
    Route::post('/pengajuan/filter','PengajuanController@filter');


    Route::get('/skripsi/{id_pengajuan}', 'SkripsiController@index');
    Route::get('/skripsi/download/{file}','SkripsiController@download');
    Route::get('/skripsi','SkripsiController@index');
    Route::get('/skripsi/{id_skripsi}/edit','SkripsiController@edit');
    Route::post('/skripsi/{id_skripsi}/update','SkripsiController@update');
    Route::get('/detail_skripsi/{id_skripsi}', 'Detail_SkripsiController@index');
    
    Route::get('/detail_skripsi/{id_dtl}/edit','Detail_SkripsiController@edit');
    Route::post('/detail_skripsi/update','Detail_SkripsiController@update');
    Route::get('/detail_skripsi/{id_dtl}/delete','Detail_SkripsiController@delete');


    Route::get('/notifikasi','NotifikasiController@index');
    Route::get('/logout','AuthController@logout');
});

Route::get('/','HomeController@index');

Route::post('/auth', 'AuthController@postlogin');

