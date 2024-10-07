<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:admin', 'namespace' => 'admin'], function () {

	//puchase module
	Route::get('/purchaseAdd', 'PurchaseController@purchaseAdd')->name('admin.purchaseAdd');
	Route::get('/purchaseList', 'PurchaseController@purchaseList')->name('admin.purchaseList');

	Route::put('/edit-purchase', 'PurchaseController@updatePurchase')->name('admin.purchase.updatePurchase');

	Route::post('/add-product-to-purchase', 'PurchaseController@productAddTopurchase')->name('admin.purchase.productAddToPurchase');
	Route::get('/remove-item/{id}', 'PurchaseController@removeItem')->name('admin.purchase.removeItem');
	Route::get('/remove-all', 'PurchaseController@removeAllItem')->name('admin.purchase.removeAllItem');
	Route::post('/updateProductQuantity', 'PurchaseController@updateProductQuantity')->name('admin.purchase.updateProductQuantity');
	Route::post('/purchase-save', 'PurchaseController@purchaseSave')->name('admin.purchase.purchaseSave');
	Route::get('/purchase-view/{id}', 'PurchaseController@purchaseView')->name('admin.modules.purchase.purchaseView');
	Route::post('/update-purchase-Qty', 'PurchaseController@updateQty')->name('admin.purchase.updateQty');
	Route::post('purchase-purchase-details', 'PurchaseController@purchaseDetails')->name('admin.purchase.purchaseDetails');
	Route::post('/search-purchase-by-id', 'PurchaseController@searchPurchaseByCode')->name('admin.purchase.searchPurchase');
	Route::get('/purchase-details-by-id/{id}', 'PurchaseController@purchaseDetailsById')->name('admin.purchase.purchaseDetailsById');
	Route::post('/search-purchase-by-date', 'PurchaseController@searchPurchasedate')->name('admin.purchase.searchPurchasedate');
	Route::get('/get/product-data', 'PurchaseController@searchProduct')->name('admin.purchase.searchProduct');
	Route::get('/get/supplier-data', 'PurchaseController@searchSupplier')->name('admin.purchase.searchSupplier');
	//delte purchase
	Route::post('delete-purchase', 'PurchaseController@purchaseDelete')->name('admin.purchase.purchaseDelete');
	//Purchaase /expense
	Route::get('/expenseList', 'ExpenseController@expenseList')->name('admin.expenseList');
	Route::get('/expenseAdd', 'ExpenseController@expenseAdd')->name('admin.expenseAdd');
	Route::post('/expense-add', 'ExpenseController@expenseSave')->name('admin.expense.expenseSave');
	Route::post('/edit-expense', 'ExpenseController@editExpense')->name('admin.expense.editExpense');
	Route::post('/update-expense', 'ExpenseController@updateExpense')->name('admin.expense.updateExpense');
	Route::post('/delete-expense', 'ExpenseController@expenseDelete')->name('admin.expense.expenseDelete');
});
