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
	if(Session::get('user_id') != '' && Session::get('name') != '' && Session::get('email') != '') {
    	return view('home.home');
	} else {
		return view('login.login');
	}
});

Route::get('/register', function () {
	if(Session::get('user_id') != '' && Session::get('name') != '' && Session::get('email') != '') {
    	return view('home.home');
	} else {
		return view('register.register');
	}
});
	
Route::post('/user_login','Admin\UserAuthenticationController@checkLogin');
Route::post('/user_register','Admin\UserAuthenticationController@userRegisteration');

Route::middleware('admin')->group(function () {
    
    Route::get('/home', function () {
    	return view('home.home');
	});

	Route::get('/user_logout','Admin\UserAuthenticationController@userLogout');
	
	Route::get('/getcustomers','Admin\CustomerController@getAllCustomersData');
	
	Route::post('/newCustomer','Admin\CustomerController@newCustomer');
	Route::get('changeCustomer/{customerId}/{operation}','Admin\CustomerController@changeCustomer');
    Route::post('editCustomer','Admin\CustomerController@editCustomer');

});
