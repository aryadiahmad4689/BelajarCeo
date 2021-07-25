<?php

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
    return view('welcome');
});
Route::get('customer-create','CustomerController@tampilCreate');
Route::post('customer-store','CustomerController@store');
Route::get('customer-index','CustomerController@index')->name('customer.index');
Route::get('customer-edit/{id}','CustomerController@tampilEdit')->name('customer.edit');
Route::post('customer-update/{id}' ,'CustomerController@update')->name('customer.update');
Route::get('customer-delete/{id}','CustomerController@delete')->name('customer.delete');

