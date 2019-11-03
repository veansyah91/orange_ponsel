<?php


Auth::routes();
//Route Dashboard

Route::get('/','DashboardsController@index');
Route::get('/dashboard/stockpriority','DashboardsController@priority');
Route::post('/dashboard/stockpriority','DashboardsController@createpriority');
Route::get('/dashboard/stockpriority/{priority}','DashboardsController@prioritydetail');
Route::patch('/dashboard/stockpriority','DashboardsController@priorityupdate');

//Route Master Supplier
Route::get('/master','MastersController@index');

//Supplier
Route::post('/master/supplier/create','MastersController@createsupplier');
Route::get('/master/supplier/{supplier}/delete','MastersController@destroysupplier');
Route::get('/master/supplier/{supplier}/edit','MastersController@editsupplier');
Route::patch('/master/supplier/{supplier}','MastersController@updatesupplier');

//customer
Route::post('/master/customer/create','MastersController@createcustomer');
Route::get('/master/customer/{customer}/delete','MastersController@destroycustomer');
Route::get('/master/customer/{customer}/edit','MastersController@editcustomer');
Route::patch('/master/customer/{customer}','MastersController@updatecustomer');

//category
Route::post('/master/category/create','MastersController@createcategory');
Route::get('/master/category/{category}/delete','MastersController@destroycategory');

//brand
Route::post('/master/brand/create','MastersController@createbrand');
Route::get('/master/brand/{brand}/delete','MastersController@destroybrand');

//item
Route::get('/master/item/{item}','MastersController@showitem');
Route::get('/master/item/{item}/delete','MastersController@destroyitem');
Route::post('/master/item/create','MastersController@createitem');

//stock
Route::get('/stock/detail','StocksController@index');
Route::get('/stock/tersedia','StocksController@available');
Route::get('/stock/input','StocksController@createstock');
Route::post('/stock/create','StocksController@storestock');
Route::get('/stock/stock/{stock}/delete','StocksController@destroystock');

//Penjualan
Route::get('/kasir','CashierController@index');



Route::get('/home', 'HomeController@index')->name('home');
