<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:admin', 'namespace' => 'admin'], function () {
	//setting/system setting
	Route::get('/system-setting', 'SystemController@systemSettingForm')->name('admin.system.setting');
	Route::post('/updateSystem', 'SystemController@updateSystem')->name('admin.system.updateSystem');
	//setting /store setting
	Route::get('store-setting', 'StoreController@store')->name('admin.store');
	Route::post('/store-save', 'StoreController@storeSave')->name('admin.store.storeSave');
	Route::post('/store-details', 'StoreController@StoreDetails')->name('admin.store.StoreDetails');
	Route::post('/store-edit', 'StoreController@StoreEdit')->name('admin.store.StoreEdit');
	Route::post('/store-update', 'StoreController@storeUpdate')->name('admin.store.storeUpdate');
	Route::post('/store-delete', 'StoreController@StoreDelete')->name('admin.store.StoreDelete');

	//setting module /category
	Route::get('/category', 'CategoryController@manageCategory')->name('admin.category');
	Route::get('/category2', 'CategoryController@manageCategory2')->name('admin.category2');
	Route::post('/saveCategory', 'CategoryController@saveCategory')->name('admin.category.categorySave');
	Route::post('/category-details', 'CategoryController@categoryDetails')->name('admin.setting.categoryDetails');
	Route::post('/edit-category', 'CategoryController@editCategory')->name('admin.setting.editCategory');
	Route::post('/update-category', 'CategoryController@updateCategory')->name('admin.category.updateCategory');
	Route::post('/delate-category', 'CategoryController@deleteCategory')->name('admin.setting.deleteCategory');
	//setting module /subcategory
	Route::get('/sub-category', 'SubCategoryController@managesSubCategory')->name('admin.subcategory');
	Route::post('/save-sub-Category', 'SubCategoryController@saveSubCategory')->name('admin.subcategory.subcategorySave');
	Route::post('/select-sub-Category', 'SubCategoryController@selectSubcategory')->name('admin.subcategory.selectSubcategory');
	Route::get('/select-sub-Category2', 'SubCategoryController@selectSubcategory2')->name('admin.subcategory.selectSubcategory2');
	Route::post('/subcategory-details', 'SubCategoryController@subcategoryDetails')->name('admin.setting.subcategoryDetails');
	Route::post('/edit-sub-category', 'SubCategoryController@editsubCategory')->name('admin.setting.editsubCategory');
	Route::post('/update-sub-category', 'SubCategoryController@updateSubCategory')->name('admin.category.updateSubCategory');
	Route::post('/delate-sub-category', 'SubCategoryController@deletesubCategory')->name('admin.setting.deletesubCategory');

	//setting/units
	Route::get('/units', 'UnitsController@units')->name('admin.units');
	Route::post('unit-save', 'UnitsController@unitSave')->name('admin.unit.unitSave');
	Route::post('/unit-details', 'UnitsController@unitDetails')->name('admin.setting.unitDetails');
	Route::post('/unit-edit', 'UnitsController@editUnit')->name('admin.setting.editUnit');
	Route::post('/unit-update', 'UnitsController@updateUnit')->name('admin.setting.updateUnit');
	Route::post('/delete-unit', 'UnitsController@deleteUnit')->name('admin.setting.deleteUnit');

	//setting/brands
	Route::get('/brands', 'BrandsController@brands')->name('admin.brands');
	Route::post('/saveBrand', 'BrandsController@saveBrand')->name('admin.brands.brandSave');
	Route::post('/brands-detaols', 'BrandsController@brandDetails')->name('admin.setting.brandDetails');
	Route::post('/edit-brand', 'BrandsController@editBrand')->name('admin.setting.editBrand');
	Route::post('/update-brands', 'BrandsController@updateBrand')->name('admin.brand.updateBrand');
	Route::post('/delete-brand', 'BrandsController@deleteBrand')->name('admin.setting.deleteBrand');
	//setting/expense category
	Route::get('/expense-category', 'ExpenseController@expensecategory')->name('admin.expensecategory');
	Route::post('/expense-category-save', 'ExpenseController@expenseCategorySave')->name('admin.expense.ExpenseCategorySave');
	Route::post('/update-expense-category', 'ExpenseController@updateExCategory')->name('admin.category.updateExCategory');
	Route::post('/edit-expense-category', 'ExpenseController@editExCat')->name('admin.setting.editExCat');
	Route::post('/delete-expense-category', 'ExpenseController@deleteExCat')->name('admin.setting.deleteExCat');
	//setting/customer Group
	Route::get('/customerGroup', 'CustomerController@customerGroup')->name('admin.customerGroup');
	Route::post('/save-customer-group', 'CustomerController@customerGroupSave')->name('admin.customerGroup.customerGroupSave');
	Route::post('/setting-customerGroup-details', 'CustomerController@customerGroupDetails')->name('admin.setting.customerGroupDetails');
	Route::post('/setting-customerGroup-edit', 'CustomerController@customerGroupEdit')->name('admin.setting.customerGroupEdit');
	Route::post('/update-customer-group', 'CustomerController@customerGroupUpdate')->name('admin.customerGroup.customerGroupUpdate');
	Route::post('/setting-delete-customer-group', 'CustomerController@deleteCustomerGroup')->name('admin.setting.deleteCustomerGroup');
});
