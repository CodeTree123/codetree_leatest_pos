<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:admin', 'namespace' => 'admin', 'prefix' => 'admin'], function () {

    //porducts module
    Route::get('/productList', 'ProductController@productList')->middleware('permission:product list')->name('admin.productList');
    Route::get('/producAdd', 'ProductController@productAddForm')->middleware('permission:add product')->name('admin.productAdd');
    Route::post('/product-save', 'ProductController@productSave')->middleware('permission:add product')->name('admin.product.productSave');
    Route::get('/printBarcode', 'ProductController@printBarcode')->middleware('permission:print barcode')->name('admin.printBarcode');
    Route::post('/generate-barcode', 'ProductController@generateBarcode')->middleware('permission:print barcode')->name('admin.product.generateBarcode');
    Route::get('/quantityAdjustment', 'ProductController@quantityAdjustment')->name('admin.quantityAdjustment');
    Route::post('/producr-details', 'ProductController@productDetails')->name('admin.product.productDetails');
    Route::get('/product-info/{id}', 'ProductController@productInfo')->name('admin.product.productInfo');
    Route::post('edit-product', 'ProductController@productEdit')->middleware('permission:edit product')->name('admin.product.productEdit');
    Route::post('/update-product-information', 'ProductController@updateProduct')->middleware('permission:edit product')->name('admin.product.updateProduct');
    Route::post('search-products', 'ProductController@searchProduct')->name('admin.product.searchProducts');
    Route::post('/delete-product', 'ProductController@deleteProduct')->middleware('permission:delete product')->name('admin.product.deleteProduct');
    //add low stcok product to purchase
    Route::get('/add-lowStock-to-purchase/{id}', 'ProductController@addStock')->name('admin.stock.lowStock.addStock');
    //stock
    Route::get('/low-stock-products', 'StockController@lowStockProduct')->name('admin.stock.lowStockProduct');


    //export product
    Route::get('export-product-excel', 'ProductController@ProductExcel')->name('admin.product.export.excel');

    //product Promotion Module
    Route::get('/promotion/list', 'ProductController@promotionlist')->name('admin.product.promotionlist');
    Route::get('/Promotion/Add', 'ProductController@promotionadd')->name('admin.product.promotion');
    Route::post('/promotion-save', 'ProductController@promotionSave')->name('admin.product.promotionSave');
    Route::post('/delete/promotion', 'ProductController@deleteProomotion')->name('admin.product.promotionDelete');
    Route::post('/edit-Promotion', 'ProductController@PromotionEdit')->name('admin.product.PromotionEdit');
    Route::post('/update-Promotion-information', 'ProductController@updatePromotion')->name('admin.product.updatePromotion');


     //product Promo code Module
     Route::get('/promoCode/list', 'ProductController@promoCodelist')->name('admin.product.promoCodelist');
    
     Route::get('/promoCode/Add', 'ProductController@promoCodeadd')->name('admin.product.promoCode');
     Route::post('/promoCode-save', 'ProductController@promoCodeSave')->name('admin.product.promoCodeSave');
     Route::post('/delete/promoCode', 'ProductController@deletepromoCode')->name('admin.product.promoCodeDelete');
     Route::post('edit-promoCode', 'ProductController@promoCodeEdit')->name('admin.product.promoCodeEdit');
     Route::post('/update-promoCode-information', 'ProductController@updatepromoCode')->name('admin.product.updatepromoCode');
});
