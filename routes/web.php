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
    return redirect()->route('login');
});

Auth::routes();

Route::group(['prefix' => 'admin'], function(){
    Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
});

//Route Operator
Route::group(['prefix' => 'operator'], function(){
    Route::get('/', 'Operator\DashboardController@index')->name('operator.dashboard');
});

Route::group(['prefix' => 'operator/manajemen_investor'], function(){
    Route::get('/', 'Operator\FormPembukaanRekening@index')->name('operator.form_pembukaan_rekening');
    Route::get('/tambah_investor','Operator\FormPembukaanRekening@tambahInvestor')->name('operator.tambah_investor');
    Route::post('/','Operator\FormPembukaanRekening@tambahInvestorPost')->name('operator.tambah_investor_post');
    Route::get('/{id}/edit','Operator\FormPembukaanRekening@edit')->name('operator.tambah_investor_post.edit');
    Route::patch('/{id}','Operator\FormPembukaanRekening@update')->name('operator.tambah_investor_update');
    Route::delete('/{id}','Operator\FormPembukaanRekening@delete')->name('operator.tambah_investor_delete');

    Route::get('/tambah_ahli_waris_investor/{id}','Operator\FormPembukaanRekening@tambahAhliWarisInvestor')->name('operator.tambah_ahli_waris_investor');
    Route::post('/tambah_ahli_waris_investor_post','Operator\FormPembukaanRekening@tambahAhliWarisInvestorPost')->name('operator.tambah_ahli_waris_investor_post');
});

Route::group(['prefix' => 'operator/manajemen_pembelian_dan_pengalihan_saham'], function(){
    Route::get('/', 'Operator\SahamInvestorController@index')->name('operator.manajemen_saham');
    Route::get('/tambah_saham', 'Operator\SahamInvestorController@tambahSaham')->name('operator.tambah_saham');
    Route::get('/investor_pengalih','Operator\SahamInvestorController@investorPengalih')->name('operator.investor_pengalih');
    Route::post('/','Operator\SahamInvestorController@tambahSahamPost')->name('operator.tambah_saham_post');
});


// Route Manajer
Route::group(['prefix' => 'manajer'], function(){
    Route::get('/', 'Manajer\DashboardController@index')->name('manajer.dashboard');
});

Route::group(['prefix' => 'manajer/verifikasi_data_investor'], function(){
    Route::get('/', 'Manajer\VerifikasiDataInvestorController@index')->name('manajer.verifikasi_data_investor');
    Route::get('/{id}/edit', 'Manajer\VerifikasiDataInvestorController@edit')->name('manajer/verifikasi_data_investor_edit');
    Route::patch('/', 'Manajer\VerifikasiDataInvestorController@verifikasi')->name('manajer.verifikasi_data_investor_update');
});
Route::group(['prefix' => 'manajer/verifikasi_rekening_Investor'], function(){
    Route::get('/', 'Manajer\VerifikasiRekeningInvestorController@index')->name('manajer.verifikasi_rekening_investor');
});

Route::group(['prefix' => 'manajer/manajemen_user'], function(){
    Route::get('/', 'Manajer\ManajemenUserController@index')->name('manajer.manajemen_user');
});


Route::get('/home', 'HomeController@index')->name('home');
