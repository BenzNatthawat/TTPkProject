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
    return view('home');
});

Route::resource('/activity','ActivityController');
Route::post('/searchform','ActivityController@searchform');

Route::resource('/package','PackageController');

Route::get('/booking','BookingAtivityController@index');

Route::resource('/BookingActivity','BookingAtivityController');
Route::get('/BookingActivity/{id_activity}/create/{id_book}','BookingAtivityController@create');
Route::post('/BookingActivity/{id_activity}/create/{id_book}','BookingAtivityController@create');

Route::resource('/BookingPackage','BookingPackageController');
Route::get('/BookingPackage/{id_package}/create/{id_book}','BookingPackageController@create');
Route::post('/BookingPackage/{id_package}/create/{id_book}','BookingPackageController@create');

Route::resource('/account','AccountController');

Route::resource('/reservation','ReservationController');
Route::get('/reservation/create/{id_book}','ReservationController@create');
Route::post('/reservation/create/{id_book}','ReservationController@create');

Route::post('/postreview/{id_activity}','ActivityController@postreview');

Route::get('/home', function () {
    return view('home');
});

Route::get('/positions','BookingController@position');
Auth::routes();

Route::get('/test', function () {
    return view('test');
});

Route::get('/getData', function () {
    return view('json.getData');
});

Route::get('/postData', function () {
    return view('json.postData');
});

//Route::get('/home', 'HomeController@index')->name('home');