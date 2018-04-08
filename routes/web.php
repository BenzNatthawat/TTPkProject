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

Route::get('/home', function () {
    return view('home');
});

Route::resource('/activity','ActivityController');
Route::post('/searchformA','ActivityController@searchform');

Route::resource('/packet','PackageController');
Route::post('/searchformP','PackageController@searchform');

Route::get('/booking','BookingAtivityController@index');
Route::get('/confirmpayment/{id}','BookingAtivityController@confirmpayment');
Route::post('/statusbooking/{id}','BookingAtivityController@statusbooking');

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

Route::post('activity/postreview/{id_activity}','ActivityController@postreview');
Route::post('packet/postreview/{id_packet}','PackageController@postreview');

Route::get('/positions','BookingAtivityController@position');
Auth::routes();

Route::get('/conditions', function () {
    return view('booking.conditions');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/contact', function () {
    return view('company.contact');
});

Route::get('/getData', function () {
    return view('json.getData');
});

Route::get('/postData', function () {
    return view('json.postData');
});

Route::get('/pay','Payment@pay');

//Route::get('/home', 'HomeController@index')->name('home');