<?php

use Illuminate\Support\Facades\Route;
//admin section start
Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');
Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');


Route::group(['middleware' => 'auth:admin', 'namespace' => 'admin'], function () {

	//admin profile
	Route::get('/admin-profile', 'UserController@profile')->name('admin.profile');
	Route::post('/admin-updateProfile', 'UserController@updateProfile')->name('admin.updateProfile');
	Route::post('/update-password', 'UserController@updatepassword')->name('admin.updatepassword');
});
