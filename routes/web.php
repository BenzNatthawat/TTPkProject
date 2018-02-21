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

Route::resource('/package','PackageController');

Route::resource('/booking','BookingController');
Route::get('/booking/{id_activity}/create/{id_book}','BookingController@create');
Route::post('/booking/{id_activity}/create/{id_book}','BookingController@create');

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

//Route::get('/home', 'HomeController@index')->name('home');