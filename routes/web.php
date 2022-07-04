<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
	return view('welcome');
});

Route::get('admin/login', 'Auth\AdminAuthController@getLogin')->name('admin.login');
Route::post('admin/login', 'Auth\AdminAuthController@postLogin')->name('admin.loginPost');
Route::post('admin/logout', 'Auth\AdminAuthController@postLogout')->name('admin.logout');

Auth::routes();

Route::get('/', 'GuestController@index')->name('index');

Route::get('pdf', 'GuestController@pdf');
Route::get('cek-email', 'GuestController@email')->name('email');

Route::namespace('User')->group(function(){
	Route::get('/home', 'DashboardController@index')->name('home');

	Route::get('keluhan', 'KeluhanController@index')->name('keluhan.index');
	Route::post('keluhan', 'KeluhanController@store')->name('keluhan.store');
	Route::delete('keluhan/{id}/delete', 'KeluhanController@destroy')->name('keluhan.delete');

	Route::get('perizinan/surat-izin-praktik/create', 'SipController@create')->name('sip.create');
	Route::post('sip-store', 'SipController@store')->name('sip.store');

	Route::get('perizinan/sedang-ditinjau', 'PerizinanController@ditinjau')->name('perizinan.ditinjau');
	Route::get('perizinan/ditolak', 'PerizinanController@ditolak')->name('perizinan.ditolak');
	Route::get('perizinan/ditolak/{no_tiket}', 'PerizinanController@show')->name('perizinan.ditolak.show');
	Route::post('perizinan/ditolak/{no_tiket}/update', 'PerizinanController@update')->name('perizinan.ditolak.update');

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

	// TEKNIS
	Route::get('perizinan-teknis', 'TeknisByController@index')->name('perizinan.teknis.index');
	Route::get('perizinan-teknis/{no_tiket}', 'TeknisByController@show')->name('perizinan.teknis.show');
	Route::put('perizinan-teknis/{no_tiket}/tolak', 'TeknisByController@tolak')->name('perizinan.teknis.tolak');
	Route::put('perizinan-teknis/{no_tiket}/verif', 'TeknisByController@verif')->name('perizinan.teknis.verif');

	// KADIS
	Route::get('perizinan-kadis', 'KadisController@index')->name('perizinan.kadis.index');
	Route::get('perizinan-kadis/{no_tiket}', 'KadisController@show')->name('perizinan.kadis.show');
	Route::put('perizinan-kadis/{no_tiket}/verif', 'KadisController@verif')->name('perizinan.kadis.verif'); // menerbitkan sertifikat

	Route::get('preview-sertifikat', 'KadisController@sertifikat')->name('preview.sertifikat');
});