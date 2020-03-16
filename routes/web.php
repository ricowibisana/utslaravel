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

Route::get('/login', 'Admin\UserController@index')->name('login');
Route::post('/postLogin', 'Admin\UserController@postLogin');
Route::get('/register', 'Admin\UserController@register');
Route::post('/storeLogin', 'Admin\UserController@store');
Route::get('/logout', 'Admin\UserController@logout');

Route::group(['middleware' => 'auth'], function(){
	Route::get('/welcome', 'Admin\BajuController@welcome');
	Route::get('/create', 'Admin\BajuController@create');
	Route::post('/store', 'Admin\BajuController@store');
	Route::get('/delete/{id}', 'Admin\BajuController@delete');
	Route::get('/update/{id}', 'Admin\BajuController@update');
	Route::post('/updateStore/{id}', 'Admin\BajuController@updateStore');

	Route::get('/jenis', 'Admin\JenisController@welcome');
	Route::get('/createJen', 'Admin\JenisController@create');
	Route::post('/storeJen', 'Admin\JenisController@store');
	Route::get('/deleteJen/{id}', 'Admin\JenisController@delete');
	Route::get('/updateJen/{id}', 'Admin\JenisController@update');
	Route::post('/updateStoreJen/{id}', 'Admin\JenisController@updateStore');

	Route::get('/User', 'Admin\UserController@welcome');
	Route::get('/createUser', 'Admin\UserController@create');
	Route::post('/storeUser', 'Admin\UserController@storeUser');
	Route::get('/deleteUser/{id}', 'Admin\UserController@delete');

});

Route::get('/', 'LandingController@index');
Route::get('/cetak_pdf', 'Landingcontroller@cetak_pdf');
Route::get('/pdf', 'Landingcontroller@buka');

Route::get('/baju/export_excel', 'Admin\BajuController@export_excel');
Route::get('/jenis/export_excel', 'Admin\JenisControlleer@export_excel');
Route::get('/user/export_excel', 'Admin\UserController@export_excel');