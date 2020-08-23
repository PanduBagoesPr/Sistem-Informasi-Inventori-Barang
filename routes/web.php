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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::group(['middleware' => ['auth']], function(){ 

    Route::get('/home', 'DashboardController@index')->name('home');

    Route::get('dashboard', 'DashboardController@index');

    // Module Category
    Route::get('categories', 'CategoryController@index');
    Route::get('category/create', 'CategoryController@create');
    Route::get('category/show/{id}', 'CategoryController@show');
    Route::get('category/{id}/edit', 'CategoryController@edit');
    Route::put('category/update/{id}', 'CategoryController@update');
    Route::post('category/store', 'CategoryController@store');
    Route::get('category/delete/{id}', 'CategoryController@destroy');

    // Module Vendor
    Route::get('vendors', 'VendorController@index');
    Route::get('vendor/create', 'VendorController@create');
    Route::get('vendor/show/{id}', 'VendorController@show');
    Route::get('vendor/{id}/edit', 'VendorController@edit');
    Route::put('vendor/update/{id}', 'VendorController@update');
    Route::post('vendor/store', 'VendorController@store');
    Route::get('vendor/delete/{id}', 'VendorController@destroy');

    // Module Employee
    Route::get('employees', 'EmployeeController@index');
    Route::get('employee/create', 'EmployeeController@create');
    Route::get('employee/show/{id}', 'EmployeeController@show');
    Route::get('employee/{id}/edit', 'EmployeeController@edit');
    Route::put('employee/update/{id}', 'EmployeeController@update');
    Route::post('employee/store', 'EmployeeController@store');
    Route::get('employee/delete/{id}', 'EmployeeController@destroy');

    // Module Product
    Route::resource('product', 'ProductController');
    Route::get('product/delete/{id}', 'ProductController@destroy');

    // Module Transaction
    Route::get('transaction/{id}/edit', 'TransactionController@edit');
    Route::get('transaction/import', 'TransactionController@import');
    Route::post('transaction/store_import', 'TransactionController@store_import');
    Route::put('transaction/update/{id}', 'TransactionController@update');
    Route::get('transaction/download', 'TransactionController@download');
    Route::resource('transaction', 'TransactionController');
    Route::get('transaction/delete/{id}', 'TransactionController@destroy');
    // Route::get('transaction/cetak_pdf','TransactionController@cetak_pdf');

    // Module Shipment
    Route::resource('shipment', 'ShipmentController');
    Route::get('shipment/delete/{id}', 'ShipmentController@destroy');

    // Module Instock
    Route::resource('instock', 'InstockController');
    Route::get('instock/delete/{id}', 'InstockController@destroy');

    // Module Outstock
    Route::resource('outstock', 'OutstockController');
    Route::get('outstock/delete/{id}', 'OutstockController@destroy');

    // Module Outstock
    Route::resource('totalstock', 'TotalstockController');
    Route::get('totalstock/delete/{id}', 'TotalstockController@destroy');
});