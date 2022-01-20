<?php

use Illuminate\Support\Facades\Route;

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
    return view('layouts.app');
});

/*----search----*/
Route::post('/category/search', [App\Http\Controllers\CategoryController::class,'search'])->name('category/search');
/*----search----*/

//Route::get('/category','App\Http\Controllers\CategoryController@index');
Route::get('/category',[App\Http\Controllers\CategoryController::class,'index']);
Route::get('/category/create',[App\Http\Controllers\CategoryController::class,'create']);
Route::post('/category/store',[App\Http\Controllers\CategoryController::class,'store']);
Route::get('/category/edit/{id}',[App\Http\Controllers\CategoryController::class,'edit']);
Route::post('/category/update/{id}','App\Http\Controllers\CategoryController@update')->name('category.update');
Route::get('category/delete/{id}','App\Http\Controllers\CategoryController@delete');


/*-------Sub Category Route--------*/
Route::get('/Subcategory',[App\Http\Controllers\SubCategoryController::class, 'index']);
//Route::get('/Subcategory','App\Http\Controllers\SubCategoryController@index');
Route::get('/Subcategory/create','App\Http\Controllers\SubCategoryController@create');
Route::post('/Subcategory/store','App\Http\Controllers\SubCategoryController@store');
Route::get('/Subcategory/edit/{id}','App\Http\Controllers\SubCategoryController@edit');
Route::post('/Subcategory/update/{id}','App\Http\Controllers\SubCategoryController@update')->name('Subcategory.update');
Route::get('/Subcategory/delete/{id}','App\Http\Controllers\SubCategoryController@delete');

/*-------Sub Sub Category Route--------*/
Route::get('/SubSubcategory','App\Http\Controllers\SubSubCategoryController@index');
Route::get('/SubSubcategory/create','App\Http\Controllers\SubSubCategoryController@create');
Route::post('/SubSubcategory/store','App\Http\Controllers\SubSubCategoryController@store');
Route::get('/SubSubcategory/edit/{id}','App\Http\Controllers\SubSubCategoryController@edit');
Route::post('/SubSubcategory/update/{id}','App\Http\Controllers\SubSubCategoryController@update')->name('SubSubcategory.update');
Route::get('/SubSubcategory/delete/{id}','App\Http\Controllers\SubSubCategoryController@delete');

/*----------------Unit MeaSures-------------------------*/
Route::get('/unit','App\Http\Controllers\UnitMeasureController@index');
Route::get('/unit/create','App\Http\Controllers\UnitMeasureController@create');
Route::post('/unit/store','App\Http\Controllers\UnitMeasureController@store');
Route::get('/unit/edit/{id}','App\Http\Controllers\UnitMeasureController@edit');
Route::post('/unit/update/{id}','App\Http\Controllers\UnitMeasureController@update')->name('unit.update');
Route::get('/unit/delete/{id}','App\Http\Controllers\UnitMeasureController@delete');

/*----------------Wire House-------------------------*/
Route::get('/Whouse','App\Http\Controllers\WarehouseController@index');
Route::get('/Whouse/create','App\Http\Controllers\WarehouseController@create');
Route::post('/Whouse/store','App\Http\Controllers\WarehouseController@store');
Route::get('/Whouse/edit/{id}','App\Http\Controllers\WarehouseController@edit');
Route::post('/Whouse/update/{id}','App\Http\Controllers\WarehouseController@update')->name('Whouse.update');
Route::get('/Whouse/delete/{id}','App\Http\Controllers\WarehouseController@delete');

/*----------------product-------------------------*/
/*----search----*/
Route::post('/product/search', [App\Http\Controllers\ProductController::class,'search'])->name('product/search');
/*----search----*/

Route::get('/product','App\Http\Controllers\ProductController@index');
Route::get('/product/create','App\Http\Controllers\ProductController@create');
Route::post('/product/store','App\Http\Controllers\ProductController@store');
Route::get('/product/edit/{id}','App\Http\Controllers\ProductController@edit');
Route::post('/product/update/{id}','App\Http\Controllers\ProductController@update')->name('product.update');
Route::get('/product/delete/{id}','App\Http\Controllers\ProductController@delete');

/*----------------Product Stocks Route-------------------------*/
// Route::get('/productStock','App\Http\Controllers\ProductStockController@index');
Route::get('/productStock', [App\Http\Controllers\ProductStockController::class, 'index']);
Route::get('/productStock/create','App\Http\Controllers\ProductStockController@create');
Route::post('/productStock/store','App\Http\Controllers\ProductStockController@store')->name('productStock.store');
Route::get('/productStock/edit/{id}','App\Http\Controllers\ProductStockController@edit');
Route::post('/productStock/update/{id}','App\Http\Controllers\ProductStockController@update')->name('productStock.update');
Route::get('/productStock/delete/{id}','App\Http\Controllers\ProductStockController@delete');


/*----------------Stocks Transfer  Route-------------------------*/
Route::get('/StockTransfer','App\Http\Controllers\StockTransferController@index');
Route::get('/StockTransfer/create','App\Http\Controllers\StockTransferController@create');
Route::post('/StockTransfer/store','App\Http\Controllers\StockTransferController@store')->name('StockTransfer.store');
Route::get('/StockTransfer/edit/{id}','App\Http\Controllers\StockTransferController@edit');
Route::post('/StockTransfer/update/{id}','App\Http\Controllers\StockTransferController@update')->name('StockTransfer.update');
Route::get('/StockTransfer/delete/{id}','App\Http\Controllers\StockTransferController@delete');

/*----------------order order order-------------------------*/
Route::get('/Order','App\Http\Controllers\OrderController@index');
Route::get('/Order/create','App\Http\Controllers\OrderController@create');
Route::post('/Order/store','App\Http\Controllers\OrderController@store')->name('Order.store');
Route::get('/Order/edit/{id}','App\Http\Controllers\OrderController@edit');
Route::post('/Order/update/{id}','App\Http\Controllers\OrderController@update')->name('Order.update');
Route::get('/Order/delete/{id}','App\Http\Controllers\OrderController@delete');

/*----------------order order order-------------------------*/
Route::get('/OrderDetails','App\Http\Controllers\OrderDetailController@index');
Route::get('/OrderDetails/create','App\Http\Controllers\OrderDetailController@create');
Route::post('/OrderDetails/store','App\Http\Controllers\OrderDetailController@store')->name('OrderDetails.store');
Route::get('/OrderDetails/edit/{id}','App\Http\Controllers\OrderDetailController@edit');
Route::post('/OrderDetails/update/{id}','App\Http\Controllers\OrderDetailController@update')->name('OrderDetails.update');
Route::get('/OrderDetails/delete/{id}','App\Http\Controllers\OrderDetailController@delete');

/*----------------Employee-------------------------*/
Route::get('/employee','App\Http\Controllers\EmployeeController@index');
Route::get('/employee/create','App\Http\Controllers\EmployeeController@create');
Route::post('/employee/store','App\Http\Controllers\EmployeeController@store');
Route::get('/employee/edit/{id}','App\Http\Controllers\EmployeeController@edit');
Route::post('/employee/update/{id}','App\Http\Controllers\EmployeeController@update')->name('employee.update');
Route::get('/employee/delete/{id}','App\Http\Controllers\EmployeeController@delete');


/*----------------PickingPicking-------------------------*/
Route::get('/OrderPicking','App\Http\Controllers\OrderPickingController@index');
Route::get('/OrderPicking/create','App\Http\Controllers\OrderPickingController@create');
Route::post('/OrderPicking/store','App\Http\Controllers\OrderPickingController@store')->name('OrderPicking.store');
Route::get('/OrderPicking/edit/{id}','App\Http\Controllers\OrderPickingController@edit');
Route::post('/OrderPicking/update/{id}','App\Http\Controllers\OrderPickingController@update')->name('OrderPicking.update');
Route::get('/OrderPicking/delete/{id}','App\Http\Controllers\OrderPickingController@delete');

/*-----------------OrderTracking------------------------*/
Route::get('/OrderTracking','App\Http\Controllers\OrderTrackingController@index');
Route::get('/OrderTracking/create','App\Http\Controllers\OrderTrackingController@create');
Route::post('/OrderTracking/store','App\Http\Controllers\OrderTrackingController@store')->name('OrderTracking.store');
Route::get('/OrderTracking/edit/{id}','App\Http\Controllers\OrderTrackingController@edit');
Route::post('/OrderTracking/update/{id}','App\Http\Controllers\OrderTrackingController@update')->name('OrderTracking.update');
Route::get('/OrderTracking/delete/{id}','App\Http\Controllers\OrderTrackingController@delete');

/*----------------ReturnProducts -------------------------*/
Route::get('/ReturnProduct','App\Http\Controllers\ReturnProductController@index');
Route::get('/ReturnProduct/create','App\Http\Controllers\ReturnProductController@create');
Route::post('/ReturnProduct/store','App\Http\Controllers\ReturnProductController@store')->name('ReturnProduct.store');
Route::get('/ReturnProduct/edit/{id}','App\Http\Controllers\ReturnProductController@edit');
Route::post('/ReturnProduct/update/{id}','App\Http\Controllers\ReturnProductController@update')->name('ReturnProduct.update');
Route::get('/ReturnProduct/delete/{id}','App\Http\Controllers\ReturnProductController@delete');


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


