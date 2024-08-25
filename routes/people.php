<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:admin', 'namespace' => 'admin'], function () {


	//peaple/user
	Route::get('/userList', 'UserController@userList')->middleware('permission:user list')->name('admin.userList');
	Route::get('/userAdd', 'UserController@userAdd')->middleware('permission:add user')->name('admin.userAdd');

	Route::get('/user-view/{id}', 'UserController@viewUser')->name('admin.people.viewUser');
	Route::get('/user-edit/{id}', 'UserController@editUser')->name('admin.people.editUser');
	Route::put('/user-update', 'UserController@userUpdate')->name('admin.people.userUpdate');
	Route::post('/user-delete', 'UserController@deleteUser')->name('admin.people.deleteUser');


	Route::get('user-roles', 'UserController@roles')->middleware('permission:user role list')->name('admin.users.roles');
	Route::post('save-role', 'UserController@saveRole')->middleware('permission:add user role')->name('admin.user.saveRole');
	Route::get('user-permission', 'UserController@permissions')->middleware('permission:permission list')->name('admin.users.permissions');
	Route::post('/save-new-user', 'UserController@saveUser')->name('admin.user.addUser');
	Route::get('roles-permission/{id}', 'UserController@RolePermissions')->middleware('permission:chnage permission')->name('admin.role.permissions');
	Route::post('/update-role-permission', 'UserController@updatePermission')->middleware('permission:chnage permission')->name('admin.user.role.updatepermission');

	//people/customer
	Route::get('/customerList', 'CustomerController@customerList')->name('admin.customerList');
	Route::get('/customerAdd', 'CustomerController@customerAdd')->name('admin.customerAdd');
	Route::post('/customer-save', 'CustomerController@customerSave')->name('admin.customer.customerSave');
	Route::get('customer-details/{id}', 'CustomerController@customerDetails')->name('admin.customer.customerDetails');
	Route::post('/customer-search-customer', 'CustomerController@searchCustomer')->name('admin.customer.searchCustomer');
	Route::post('/customer-info', 'CustomerController@customerInfo')->name('admin.customer.customerInfo');
	Route::post('/update-customer', 'CustomerController@updateCustomer')->name('admin.customer.updateCustomer');
	//due return
	Route::post('sale-due-return', 'CustomerController@returnSalesDue')->name('admin.customerdue.returnSalesDue');
	Route::post('/customer-total-due', 'CustomerController@customerTotalDue')->name('admin.customer.customerTotalDue');
	Route::post('/customer-due-payment', 'CustomerController@duePayment')->name('admin.customer.duePayment');

	//people - biller
	Route::get('/biller-add', 'BillerController@addBiller')->name('admin.people.addBiller');
	Route::post('/biller-save', 'BillerController@billerSave')->name('admin.biller.billerSave');
	Route::get('/biller-lists', 'BillerController@listBiller')->name('admin.people.listBiller');
	Route::get('/biller-view/{id}', 'BillerController@viewBiller')->name('admin.people.viewBiller');
	Route::get('/biller-edit/{id}', 'BillerController@editBiller')->name('admin.people.editBiller');
	Route::put('/biller-update', 'BillerController@billerUpdate')->name('admin.biller.billerUpdate');

	//people/supplier
	Route::get('/supplierList', 'SupplierController@supplierList')->name('admin.supplierList');
	Route::get('/supplierAdd', 'SupplierController@supplierAdd')->name('admin.supplierAdd');
	Route::post('/sapplier-save', 'SupplierController@supplierSave')->name('admin.supplier.supplierSave');
	Route::get('/supplier-supplierDetails/{id}', 'SupplierController@supplierDetails')->name('admin.supplier.supplierDetails');
	Route::post('/supplier-info', 'SupplierController@supplierInfo')->name('admin.supplier.supplierInfo');
	Route::post('/update-supplier', 'SupplierController@updateSupplier')->name('admin.supplier.updateSupplier');
});
