<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin')->name('admin.loginPost');
Route::post('admin/logout', 'Auth\AdminAuthController@postLogout')->name('admin.logout');

Auth::routes();
Route::get('qrcode', function () {
	$image = \QrCode::format('png')
	->size(200)->errorCorrection('H')
	->generate('A simple example of QR code!');
	$output_file = 'qr-code/img-' . time() . '.png';
	Storage::disk('public')->put($output_file, $image);
});
Route::get('/', 'GuestController@index')->name('index');
Route::get('/tentang', 'GuestController@tentang')->name('tentang');
Route::get('/visi-misi', 'GuestController@visi')->name('visi');
Route::get('/struktur-organisasi', 'GuestController@struktur')->name('struktur');
Route::get('/layanan', 'GuestController@layanan')->name('layanan');
Route::get('pdf', 'GuestController@pdf');
Route::get('cek-email', 'GuestController@email')->name('email');
Route::get('qr', 'GuestController@qr');

Route::namespace('User')->group(function(){

	Route::get('/cek-kelurahan/{kec}', 'SipController@kelurahan');

	Route::get('/home', 'DashboardController@index')->name('home');

	Route::get('keluhan', 'KeluhanController@index')->name('keluhan.index');
	Route::post('keluhan', 'KeluhanController@store')->name('keluhan.store');
	Route::delete('keluhan/{id}/delete', 'KeluhanController@destroy')->name('keluhan.delete');

	// SIP
	Route::get('perizinan/surat-izin-praktik/create', 'SipController@create')->name('sip.create');
	Route::put('perizinan/{id}/update-sip', 'SipController@update')->name('sip.update');
	Route::post('sip-store', 'SipController@store')->name('sip.store');
	// SIK
	Route::get('perizinan/surat-izin-kerja/create', 'SikController@create')->name('sik.create');
	Route::put('perizinan/{id}/update-sik', 'SikController@update')->name('sik.update');
	Route::post('sik-store', 'SikController@store')->name('sik.store');
	// PENDIDIKAN
	Route::get('perizinan/izin-pendidikan/create', 'PendidikanController@create')->name('pendidikan.create');

	// PERIZINAN ANDA
	Route::get('perizinan', 'PerizinanController@index')->name('perizinan.index');
	Route::get('perizinan/{no_tiket}', 'PerizinanController@show')->name('perizinan.ditolak.show');
	Route::post('perizinan/{no_tiket}/update', 'PerizinanController@update')->name('perizinan.ditolak.update');

	// DOWNLOAD
	Route::get('download', 'DownloadController@index')->name('download.index');

});


Route::middleware('auth:admin')->prefix('admin')->namespace('Admin')->group(function(){
	Route::get('/404', 'HomeController@error')->name('error');

	Route::get('/', 'HomeController@index')->name('admin.dashboard');

	Route::get('manage-user', 'ManageUserController@index')->name('manage.user.index');

	Route::get('manage-admin', 'ManageAdminController@index')->name('manage.admin.index');
	Route::post('manage-admin', 'ManageAdminController@store')->name('manage.admin.store');

	Route::get('manage-keluhan', 'ManageKeluhanController@index')->name('manage.keluhan.index');

	// BIDANG
	Route::get('perizinan-bidang', 'BidangByController@index')->name('perizinan.bidang.index');
	Route::get('perizinan-bidang/{no_tiket}', 'BidangByController@show')->name('perizinan.bidang.show');
	Route::put('perizinan-bidang/{no_tiket}/tolak', 'BidangByController@tolak')->name('perizinan.bidang.tolak');
	Route::put('perizinan-bidang/{no_tiket}/verif', 'BidangByController@verif')->name('perizinan.bidang.verif');
	Route::put('perizinan-bidang/reason/{id}/{jenis}', 'BidangByController@reason')->name('reason.bidang');
	Route::put('perizinan-bidang/ceklis/{id}', 'BidangByController@ceklis')->name('ceklis.bidang');

	// TEKNIS
	Route::get('perizinan-teknis', 'TeknisByController@index')->name('perizinan.teknis.index');
	Route::get('perizinan-teknis/{no_tiket}', 'TeknisByController@show')->name('perizinan.teknis.show');
	Route::put('perizinan-teknis/{no_tiket}/tolak', 'TeknisByController@tolak')->name('perizinan.teknis.tolak');
	Route::put('perizinan-teknis/{no_tiket}/verif', 'TeknisByController@verif')->name('perizinan.teknis.verif');
	Route::put('perizinan-teknis/reason/{id}/{jenis}', 'TeknisByController@reason')->name('reason.teknis');
	Route::put('perizinan-teknis/ceklis/{id}', 'TeknisByController@ceklis')->name('ceklis.teknis');

	// KADIS
	Route::get('perizinan-kadis', 'KadisController@index')->name('perizinan.kadis.index');
	Route::get('perizinan-kadis/{no_tiket}', 'KadisController@show')->name('perizinan.kadis.show');
	Route::put('perizinan-kadis/{no_tiket}/verif', 'KadisController@verif')->name('perizinan.kadis.verif'); // menerbitkan sertifikat
	Route::get('cek/{no_tiket}/verif', 'KadisController@sertifikat'); // cek menerbitkan sertifikat

	Route::get('preview-sertifikat', 'KadisController@sertifikat')->name('preview.sertifikat');

	// SUPERADMIN
	Route::get('setting', 'SettingController@index')->name('setting.index');
	Route::post('store-subizin', 'SettingController@storesub')->name('subizin.store'); // store sub izin
	Route::delete('delete-subizin/{id}', 'SettingController@deletesub')->name('subizin.delete'); // delete sub izin
});