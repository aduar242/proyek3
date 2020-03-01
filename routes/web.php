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

Route::get('/','HomeController@index')->name('homemap');
Route::get('/email', function () {
    return view('email/email');
});

Auth::routes();
Route::get('/home', 'HomeController@home')->name('home');
Route::get('/ingatkan','HomeController@ingatkan')->name('ingatkan');

Route::group(['middleware' => ['auth']], function() {

// START route bagian client
route::get('/a/{kecamatan}','ClientController@alamat');
Route::resource('/client', 'ClientController');
Route::get('/client', 'ClientController@index')->name('client');
Route::get('/client/destroy/{id}', 'ClientController@destroy')->name('client.destroy');
Route::post('/client/store', 'ClientController@store')->name('client.store');
Route::get('/client/edit/{id}', 'ClientController@edit')->name('client.edit');
Route::post('/client/edit/{id}', 'ClientController@update')->name('client.update');
// END route bagian client

// START route bagian paket
Route::resource('/paket', 'PaketController');
Route::get('/paket', 'PaketController@index')->name('paket');
Route::get('/paket/destroy/{id}', 'PaketController@destroy')->name('paket.destroy');
Route::post('/paket/store', 'PaketController@store')->name('paket.store');
// END route bagian paket

// START route bagian user
Route::resource('/user', 'UserController');
Route::get('/user', 'UserController@index')->name('user');
// END route bagian user

// START route bagian role
Route::resource('/role', 'RoleController');
Route::get('/role', 'RoleController@index')->name('role');
// END route bagian role

// START route bagian MAP
Route::resource('/map', 'MapController');
Route::get('/map/edit/{id}', 'MapController@edit')->name('map.edit');
Route::post('/map/edit/{id}', 'MapController@update')->name('map.update');
Route::get('/map/destroy/{id}', 'MapController@destroy')->name('map.destroy');
Route::get('/map', 'MapController@index')->name('map');
// END route bagian MAP

// START route bagian Setting Map
Route::resource('/setting', 'SettingController');
Route::get('/setting', 'SettingController@index')->name('setting');

// END route bagian Setting Map

});

//STart route laporan
Route::resource('/lap', 'LaporanController');
Route::get('/lap','LaporanController@show')->name('lap');
Route::post('/lap/ubah','LaporanController@ubah')->name('ubah.lap');
Route::post('/lap/cetak','LaporanController@cetak')->name('cetak.lap');
//end route
// Start route pelayanan
Route::resource('/pelayanan','PelayananController');
Route::get('/pelayanan','PelayananController@show')->name('pel');
// end route

Route::resource('extend','ExtendController');
Route::get('extend/{id}','ExtendController@show')->name('extend');
Route::post('/harga','ExtendController@harga')->name('harga');
Route::post('extend/update','ExtendController@update')->name('extend.update');

