<?php

/*
|--------------------------------------------------------------------------
|
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('/login');
});

Route::get('/track', 'TrackController@showhomepage');
Route::get('/logout', 'UserController@logout');
// Route::get('logout', 'Auth\LoginController@logout');

Route::view('/login', 'login');
Route::view('/clerklogin', 'clerklogin');
Route::view('/index', 'index')->middleware('auth');
Route::view('/navbar_admin', 'navbar_admin');
Route::view('tracking', 'tracking')->middleware('auth');
Route::view('/orders', 'addorder')->middleware('auth');
Route::view('/orders', 'edit')->middleware('auth');
Route::view('/clerklayouts', 'clerklayouts')->middleware('auth');
Route::view('clerkindex', 'clerkindex')->middleware('auth');

Route::view('/report', 'report')->middleware('auth');
Route::view('/printable', 'printable')->middleware('auth');
Route::view('/clerkprintable', 'clerkprintable')->middleware('auth');

Route::resource('/register', 'UserController');
Route::resource('/users', 'UserController@edit')->middleware('auth');

Route::post('login', ['as' => 'login', 'uses' => 'UserController@login']);

Route::resource('/products', 'ProductController')->middleware('auth');
Route::resource('/customers', 'CustomerController')->middleware('auth');
Route::resource('/clerkcustomers', 'ClerkCustomerController')->middleware('auth');
Route::resource('/clerkorders', 'ClerkOrderController')->middleware('auth');
Route::resource('/vehicles', 'VehicleController')->middleware('auth');
Route::resource('/personnels', 'PersonnelController')->middleware('auth');
Route::resource('/orders', 'OrderController')->middleware('auth');
//
Route::resource('/report', 'ReportController')->middleware('auth');
Route::resource('/printable', 'PrintableController')->middleware('auth');
Route::resource('/clerkprintable', 'ClerkPrintableController')->middleware('auth');
Route::resource('/clerkreport', 'ClerkReportController')->middleware('auth');
Route::resource('/units', 'UnitController')->middleware('auth');
Route::resource('/vehicletypes', 'VehicleTypeController')->middleware('auth');
Route::resource('/personneltypes', 'PersonnelTypeController')->middleware('auth');

Route::post('/index', 'Usercontroller@register');
Route::post('/register', 'UserController@register');
Route::post('/customers/edit', 'CustomerController@show');

Route::view('/register', 'register');
Route::post('/register', 'UserController@register');

Route::resource('/user', 'UserController')->middleware('auth');

Route::group(['prefix' => 'api', 'middleware' => 'cors'], function () {
    Route::post('login', 'APIController@authenticate');
    Route::get('driver/{userId}/orders', 'APIController@getAssignedOrders');
    Route::post('order', 'APIController@setOrderStatus');
});
