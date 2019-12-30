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
Route::get('/user/logout','Auth\LoginController@logoutUser')->name('user.logout');

// Route::group(['prefix' => 'admin'], function(){
//     Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');
// });

//Route Operator
Route::group(['prefix' => 'operator'], function(){
    Route::get('/', 'Operator\DashboardController@index')->name('operator.dashboard');
});

Route::group(['prefix' => 'operator/manajemen_investor'], function(){
    Route::get('/', 'Operator\FormPembukaanRekening@index')->name('operator.form_pembukaan_rekening');
    Route::get('/tambah_investor','Operator\FormPembukaanRekening@tambahInvestor')->name('operator.tambah_investor');
    Route::post('/tambah_investor/cari_noreg','Operator\FormPembukaanRekening@cariNoreg')->name('admin.manajemen_investor.cari_noreg');
    Route::post('/','Operator\FormPembukaanRekening@tambahInvestorPost')->name('operator.tambah_investor_post');
    Route::get('/{id}/edit','Operator\FormPembukaanRekening@edit')->name('operator.tambah_investor_post.edit');
    Route::patch('/{id}','Operator\FormPembukaanRekening@update')->name('operator.tambah_investor_update');
    Route::delete('/{id}','Operator\FormPembukaanRekening@delete')->name('operator.tambah_investor_delete');

    Route::get('/tambah_ahli_waris_investor/{id}','Operator\FormPembukaanRekening@tambahAhliWarisInvestor')->name('operator.tambah_ahli_waris_investor');
    Route::post('/tambah_ahli_waris_investor_post','Operator\FormPembukaanRekening@tambahAhliWarisInvestorPost')->name('operator.tambah_ahli_waris_investor_post');
});

Route::group(['prefix' => 'operator/pembukaan_rekening_institusi'], function(){
    Route::get('/', 'Operator\FormPembukaanRekeningInstitusi@index')->name('operator.pembukaan_rekening_institusi');
    Route::get('/tambah_institusi','Operator\FormPembukaanRekeningInstitusi@tambahInstitusi')->name('operator.tambah_institusi');
    Route::post('/tambah_institusi/cari_noreg','Operator\FormPembukaanRekeningInstitusi@cariNoreg')->name('admin.manajemen_institusi.cari_noreg');
    Route::post('/','Operator\FormPembukaanRekeningInstitusi@tambahInstitusiPost')->name('operator.tambah_institusi_post');
    Route::get('/{id}/edit','Operator\FormPembukaanRekeningInstitusi@edit')->name('operator.tambah_institusi_post.edit');
    Route::patch('/{id}','Operator\FormPembukaanRekeningInstitusi@update')->name('operator.tambah_institusi_update');
    Route::delete('/{id}','Operator\FormPembukaanRekeningInstitusi@delete')->name('operator.tambah_institusi_delete');

});

Route::group(['prefix' => 'operator/manajemen_pembelian_dan_pengalihan_saham'], function(){
    Route::get('/', 'Operator\SahamInvestorController@index')->name('operator.manajemen_saham');
    Route::get('/tambah_saham_institusi', 'Operator\SahamInvestorController@tambahSaham')->name('operator.tambah_saham');
    Route::get('/investor_pengalih','Operator\SahamInvestorController@investorPengalih')->name('operator.investor_pengalih');
    Route::post('/','Operator\SahamInvestorController@tambahSahamPost')->name('operator.tambah_saham_post');
    Route::get('/sk3s/{id}','Operator\SahamInvestorController@sk3s')->name('operator.sk3s');
    Route::get('/spmpkop/{id}','Operator\SahamInvestorController@spmpkop')->name('operator.spmpkop');
    Route::get('/detail','Operator\SahamInvestorController@detail')->name('operator.detail_saham');

});

Route::group(['prefix' => 'operator/pembelian_saham_institusi'], function(){
    Route::get('/', 'Operator\PembelianSahamInstitusiController@index')->name('operator.pembelian_saham_institusi');
    Route::get('/tambah_saham', 'Operator\PembelianSahamInstitusiController@tambahSaham')->name('operator.tambah_saham_institusi');
    Route::get('/investor_pengalih','Operator\PembelianSahamInstitusiController@investorPengalih')->name('operator.investor_pengalih');
    Route::post('/','Operator\PembelianSahamInstitusiController@tambahSahamPost')->name('operator.tambah_saham_institusi_post');
    Route::get('/sk3s/{id}','Operator\PembelianSahamInstitusiController@sk3s')->name('operator.sk3s');
});

Route::group(['prefix' => 'operator/backup_data'], function(){
    Route::get('/', 'Operator\BackupDataController@index')->name('operator.backup_data');
    Route::get('/eksport','Operator\BackupDataController@eksport')->name('operator.eksport');
    Route::get('/eksport_saham_perorangan','Operator\BackupDataController@eksportSahamPerorangan')->name('operator.eksport_saham_perorangan');
    Route::get('/eksport_saham_nonperorangan','Operator\BackupDataController@eksportSahamNonperorangan')->name('operator.eksport_saham_nonperorangan');
    Route::get('/eksport_institusi','Operator\BackupDataController@EksportInstitusi')->name('operator.eksport_institusi');
    Route::post('/import','Operator\BackupDataController@import')->name('operator.import');
});



// Route Manajer
Route::group(['prefix' => 'manajer'], function(){
    Route::get('/', 'Manajer\DashboardController@index')->name('manajer.dashboard');
});

Route::group(['prefix' => 'manajer/verifikasi_data_investor'], function(){
    Route::get('/', 'Manajer\VerifikasiDataInvestorController@index')->name('manajer.verifikasi_data_investor');
    Route::get('/{id}/edit', 'Manajer\VerifikasiDataInvestorController@edit')->name('manajer/verifikasi_data_investor_edit');
    Route::patch('/', 'Manajer\VerifikasiDataInvestorController@verifikasi')->name('manajer.verifikasi_data_investor_update');
    Route::get('/detail','Manajer\VerifikasiDataInvestorController@detail')->name('manajer.verifikasi_data_investor_detail');
});
Route::group(['prefix' => 'manajer/verifikasi_rekening_investor'], function(){
    Route::get('/', 'Manajer\VerifikasiRekeningInvestorController@index')->name('manajer.verifikasi_rekening_investor');
    Route::get('/{id}/edit', 'Manajer\VerifikasiRekeningInvestorController@edit')->name('manajer.verifikasi_data_saham_edit');
    Route::patch('/', 'Manajer\VerifikasiRekeningInvestorController@verifikasi')->name('manajer.verifikasi_data_saham_update');
});

Route::group(['prefix' => 'manajer/verifikasi_data_institusi'], function(){
    Route::get('/', 'Manajer\VerifikasiDataInstitusiController@index')->name('manajer.verifikasi_data_institusi');
    Route::get('/{id}/edit', 'Manajer\VerifikasiDataInstitusiController@edit')->name('manajer.verifikasi_data_institusi_edit');
    Route::patch('/', 'Manajer\VerifikasiDataInstitusiController@verifikasi')->name('manajer.verifikasi_data_institusi_update');
});
Route::group(['prefix' => 'manajer/verifikasi_rekening_institusi'], function(){
    Route::get('/', 'Manajer\VerifikasiRekeningInstitusiController@index')->name('manajer.verifikasi_rekening_institusi');
    Route::get('/{id}/edit', 'Manajer\VerifikasiRekeningInstitusiController@edit')->name('manajer.verifikasi_rekening_institusi_edit');
    Route::patch('/', 'Manajer\VerifikasiRekeningInstitusiController@verifikasi')->name('manajer.verifikasi_rekening_institusi_update');
});

Route::group(['prefix' => 'manajer/manajemen_agen_pemasaran'], function(){
    Route::get('/', 'Manajer\ManajemenAgenPemasaranController@index')->name('manajer.manajemen_agen_pemasaran');
    Route::post('/','Manajer\ManajemenAgenPemasaranController@post')->name('manajer.manajemen_agen_pemasaran_post');
    Route::get('/{id}/edit', 'Manajer\ManajemenAgenPemasaranController@edit')->name('manajer.manajemen_agen_pemasaran_edit');
    Route::patch('/', 'Manajer\ManajemenAgenPemasaranController@update')->name('manajer.manajemen_agen_pemasaran_update');
    Route::delete('/','Manajer\ManajemenAgenPemasaranController@delete')->name('manajer.manajemen_agen_pemasaran_delete');
    Route::patch('/aktifkan_status/{id}','Manajer\ManajemenAgenPemasaranController@aktifkanStatus')->name('manajer.manajemen_agen_pemasaran_aktifkan_status');
    Route::patch('/nonaktifkan_status/{id}','Manajer\ManajemenAgenPemasaranController@nonAktifkanStatus')->name('manajer.manajemen_agen_pemasaran_nonaktifkan_status');
});

Route::group(['prefix' => 'manajer/manajemen_pejabat_berwenang'], function(){
    Route::get('/', 'Manajer\ManajemenPejabatBerwenangController@index')->name('manajer.manajemen_pejabat_berwenang');
    Route::post('/','Manajer\ManajemenPejabatBerwenangController@post')->name('manajer.manajemen_pejabat_berwenang_post');
    Route::get('/{id}/edit', 'Manajer\ManajemenPejabatBerwenangController@edit')->name('manajer.manajemen_pejabat_berwenang_edit');
    Route::patch('/', 'Manajer\ManajemenPejabatBerwenangController@update')->name('manajer.manajemen_pejabat_berwenang_update');
    Route::delete('/','Manajer\ManajemenPejabatBerwenangController@delete')->name('manajer.manajemen_pejabat_berwenang_delete');
    Route::patch('/aktifkan_status/{id}','Manajer\ManajemenPejabatBerwenangController@aktifkanStatus')->name('manajer.manajemen_pejabat_berwenang_aktifkan_status');
    Route::patch('/nonaktifkan_status/{id}','Manajer\ManajemenPejabatBerwenangController@nonAktifkanStatus')->name('manajer.manajemen_pejabat_berwenang_nonaktifkan_status');
});

Route::group(['prefix' => 'manajer/manajemen_ketua_koperasi'], function(){
    Route::get('/', 'Manajer\ManajemenKetuaKoperasiController@index')->name('manajer.manajemen_ketua_koperasi');
    Route::post('/','Manajer\ManajemenKetuaKoperasiController@post')->name('manajer.manajemen_ketua_koperasi_post');
    Route::get('/{id}/edit', 'Manajer\ManajemenKetuaKoperasiController@edit')->name('manajer.manajemen_ketua_koperasi_edit');
    Route::patch('/', 'Manajer\ManajemenKetuaKoperasiController@update')->name('manajer.manajemen_ketua_koperasi_update');
    Route::delete('/','Manajer\ManajemenKetuaKoperasiController@delete')->name('manajer.manajemen_ketua_koperasi_delete');
    Route::patch('/aktifkan_status/{id}','Manajer\ManajemenKetuaKoperasiController@aktifkanStatus')->name('manajer.manajemen_ketua_koperasi_aktifkan_status');
    Route::patch('/nonaktifkan_status/{id}','Manajer\ManajemenKetuaKoperasiController@nonAktifkanStatus')->name('manajer.manajemen_ketua_koperasi_nonaktifkan_status');
});

Route::group(['prefix' => 'manajer/laporan'], function(){
    Route::get('/laporan_data_nasabah', 'LaporanController@laporanNasabah')->name('manajer.laporan_nasabah');
    Route::get('/laporan_data_nasabah/filter', 'LaporanController@laporanNasabahFilter')->name('manajer.laporan_nasabah_filter');
    Route::get('/laporan_saham_nasabah', 'LaporanController@laporanSahamNasabah')->name('manajer.data_saham_nasabah');
    Route::get('/laporan_saham_nasabah/filter', 'LaporanController@laporanSahamNasabahFilter')->name('manajer.laporan_saham_filter');
});




// Route Administrator
Route::group(['prefix' => 'administrator'], function(){
    Route::get('/login','AuthAdmin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login','AuthAdmin\LoginController@login')->name('admin.login.submit');
    Route::get('/', 'Admin\DashboardController@index')->name('administrator.dashboard');
    Route::get('/logout','Auth\LoginController@logout')->name('admin.logout');
});

Route::group(['prefix' => 'administrator/manajemen_admin'], function(){
    Route::get('/', 'Admin\ManajemenAdminController@index')->name('administrator.manajemen_admin');
    Route::post('/', 'Admin\ManajemenAdminController@addPost')->name('administrator.manajemen_admin_tambah_post');
    Route::get('/{id}/edit', 'Admin\ManajemenAdminController@edit')->name('administrator.manajemen_admin_edit');
    Route::patch('/', 'Admin\ManajemenAdminController@update')->name('administrator.manajemen_admin_update');
    Route::delete('/','Admin\ManajemenAdminController@delete')->name('administrator.manajemen_admin_delete');
    Route::patch('/editPass', 'Admin\ManajemenAdminController@passUpdate')->name('administrator.manajemen_admin_pass');
});

Route::group(['prefix' => 'administrator/manajemen_operator'], function(){
    Route::get('/', 'Admin\ManajemenOperatorController@index')->name('administrator.manajemen_operator');
    Route::post('/add', 'Admin\ManajemenOperatorController@addPost')->name('administrator.manajemen_operator_addpost');
    Route::get('/{id}/edit', 'Admin\ManajemenOperatorController@edit')->name('administrator.manajemen_operator_edit');
    Route::patch('/', 'Admin\ManajemenOperatorController@update')->name('administrator.manajemen_operator_update');
    Route::delete('/', 'Admin\ManajemenOperatorController@delete')->name('administrator.manajemen_operator_delete');
    Route::patch('/editPass', 'Admin\ManajemenOperatorController@ubahPass')->name('administrator.manajemen_operator_ubahpass');
});

Route::group(['prefix' => 'administrator/manajemen_manajer'], function(){
    Route::get('/', 'Admin\ManajemenManajerController@index')->name('administrator.manajemen_manajer');
    Route::post('/add', 'Admin\ManajemenManajerController@addPost')->name('administrator.manajemen_manajer_addpost');
    Route::get('/{id}/edit', 'Admin\ManajemenManajerController@edit')->name('administrator.manajemen_manajer_edit');
    Route::patch('/', 'Admin\ManajemenManajerController@update')->name('administrator.manajemen_manajer_update');
    Route::delete('/', 'Admin\ManajemenManajerController@delete')->name('administrator.manajemen_manajer_delete');
    Route::patch('/editPass', 'Admin\ManajemenManajerController@ubahPass')->name('administrator.manajemen_manajer_ubahpass');

});

Route::group(['prefix'  =>  'administrator/manajemen_barcode'], function(){
    Route::get('/', 'Admin\ManajemenBarcodeController@index')->name('administrator.manajemen_barcode');
    Route::post('/add', 'Admin\ManajemenBarcodeController@addPost')->name('administrator.manajemen_barcode_addpost');
    Route::get('/{id}/edit', 'Admin\ManajemenBarcodeController@edit')->name('administrator.manajemen_barcode_edit');
    Route::patch('/', 'Admin\ManajemenBarcodeController@update')->name('administrator.manajemen_barcode_update');
    Route::delete('/', 'Admin\ManajemenBarcodeController@delete')->name('administrator.manajemen_barcode_delete');

});



Route::get('/home', 'HomeController@index')->name('home');
