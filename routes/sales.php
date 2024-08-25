<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:admin', 'namespace' => 'admin'], function () {

	//sales module
	Route::get('/salesList', 'SalesController@salesList')->middleware('permission:sales list')->name('admin.salesList');
	Route::get('/posSale', 'SalesController@posSale')->name('admin.posSale');
	Route::get('/salesAdd', 'SalesController@salesAdd')->middleware('permission:Add sale')->name('admin.salesAdd');
	Route::get('/get-customers', 'SalesController@getCustomers')->middleware('permission:Add sale')->name('admin.salesAdd.select2');
	Route::post('/sales-sales-details', 'SalesController@salesDetails')->name('admin.sales.salesDetails');
	Route::post('/search-sale-by-code', 'SalesController@searchSalesByCode')->name('admin.sales.searchSales');
	Route::post('/search-sale-by-date', 'SalesController@searchSalesByDate')->name('admin.sales.searchSaledate');
	Route::get('/sale-details-by-id/{id}', 'SalesController@salesView')->name('admin.sales.salesView');
	Route::post('sales-setSalesType', 'SalesController@setSalesType')->name('admin.sales.setSalesType');
	Route::post('sales-setCustomer', 'SalesController@setCustomer')->name('admin.sales.setCustomer');
	Route::post('sales-customerReset', 'SalesController@customerReset')->name('admin.sales.customerReset');
	Route::get('/sales-remove-all-item', 'SalesController@removeAllItem')->name('admin.sales.removeAllItem');
	Route::get('/sales-remove-item/{id}', 'SalesController@removeItem')->name('admin.sales.removeItem');
	Route::post('sales-destorySalesType', 'SalesController@destorySalesType')->name('admin.sales.destorySalesType');
	Route::post('sales-new-sales', 'SalesController@productAddToSale')->name('admin.sales.productAddToSale');
	Route::post('sales-tax', 'SalesController@updateTax')->name('admin.sales.updateTax');
	Route::post('sales-discount', 'SalesController@SalesDiscount')->name('admin.sales.SalesDiscount');
	Route::post('sales-get-product-info', 'SalesController@getProductInfo')->name('admin.sales.getProductInfo');
	Route::post('sales-update-price', 'SalesController@productPriceUpdate')->name('admin.sales.productPriceUpdate');
	Route::post('sales-make-sale', 'SalesController@MakeSale')->name('admin.sales.MakeSale');
	Route::get('sales-view-invoice/{id}', 'SalesController@invoiceView')->name('admin.sales.invoiceView');
	//delete sales
	Route::post('/delete-sales', 'SalesController@deleteSale')->name('admin.sales.deleteSale');
});
