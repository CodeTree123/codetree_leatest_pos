<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:admin','namespace'=>'pos'], function()
{


//pos module 
	Route::get('/POS','PosController@index')->middleware('permission:pos module')->name('admin.posModule');
	Route::post('pos-setCustomer','PosController@setCustomer')->name('admin.pos.setCustomer');
	Route::post('pos-customerReset','PosController@customerReset')->name('admin.pos.customerReset');
	Route::post('/search-product','PosController@searchProduct')->name('admin.pos.searchProduct');
	Route::post('/add-to-cart','PosController@addToCart')->name('admin.pos.addToCart');
	Route::post('/add-to-cart-with-bar','PosController@addToCartWithBar')->name('admin.pos.addToCartWithBar');

	Route::post('/remove-item-from-pos','PosController@removeItem')->name('admin.pos.removeItem');
	Route::get('/clear-pos','PosController@removeAllItem')->name('admin.pos.removeAllItem');
	Route::post('/customer-details','PosController@CustomerDetails')->name('admin.pos.CustomerDetails');
	Route::post('/add-customer','PosController@addCustomer')->name('admin.pos.addCustomer');
	Route::post('/brand-products','PosController@searchProductByBrandId')->name('admin.pos.searchProductByBrandId');
	Route::post('/category-products','PosController@searchProductByCatId')->name('admin.pos.searchProductByCatId');
	Route::post('/sub-category-products','PosController@searchProductBySubcatId')->name('admin.pos.searchProductBySubcatId');
	Route::post('/bill-preview','PosController@billPreview')->name('admin.pos.billPreview');
	Route::post('/payment-screen','PosController@paymentScreen')->name('admin.pos.paymentScreen');
	Route::post('/update-tax','PosController@updateTax')->name('admin.pos.updateTax');
	Route::post('/update-discount','PosController@updateDiscount')->name('admin.pos.updateDiscount');
	Route::post('/update-Qty','PosController@updateQty')->name('admin.pos.updateQty');
	Route::post('/make-invoice','PosController@makeInvoice')->name('admin.pos.makeInvoice');
	Route::get('bill-view/{id}','PosController@billView')->name('admin.pos.billView');
	Route::get('today-sales','PosController@todaySales')->name('admin.pos.todaySales');
	Route::post('save-expense-pos','PosController@expenseSave')->name('admin.pos.expenseSave');
	Route::get('today-profit-loss','PosController@todayprofit')->name('admin.pos.todayprofit');
	Route::post('pos-product-save','PosController@productSave')->name('admin.pos.productSave');
	Route::post('get-product-info','PosController@getProductInfo')->name('admin.pos.getProductInfo');
	Route::post('pos-product-info-update','PosController@productInfoUpdate')->name('admin.pos.productInfoUpdate');
	//delete bill
	Route::get('/pos-delete-sale/{id}','PosController@deleteSale')->name('admin.pos.deleteSale');
});