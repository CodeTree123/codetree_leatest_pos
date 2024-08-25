<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:admin', 'namespace' => 'admin'], function () {
	//sms 
	Route::get('/sms-setting', 'SmsController@smsSetting')->name('admin.sms.smsSetting');
	Route::get('/send-Sms', 'SmsController@sendSms')->name('admin.sms.sendSms');
	Route::get('/smsToAll', 'SmsController@smsToAll')->name('admin.sms.smsToAll');
});
