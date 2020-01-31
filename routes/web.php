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


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function() {

// START route bagian client
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

});

//STart route laporan
Route::resource('/lap', 'LaporanController');
Route::get('/lap','LaporanController@index')->name('lap');
//end route

Route::resource('extend','ExtendController');
Route::get('extend/{id}','ExtendController@show')->name('extend');

Route::get('/map', function (){
    $config['center'] = 'Air Canada Center, Toronto';
    $config['zoom'] = '14';
    $config['map_height'] = '500px';
    $config['scrollwheel'] = false;
    GMaps::initialize($config);
    $map = GMaps::create_map();

    return view('map')-with('map', $map);

});