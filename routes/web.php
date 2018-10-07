<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/apply', 'Apply@getWorkData')->name('apply') ;
Route::post('/apply', 'Apply@postWorkData')->name('applied');

Route::match(['get','post'],'/apply2','Apply@freeWork')->name('freeWork');

Route::get('/vendor', 'Vendor@getVendorData')->name('getVendor');
Route::post('/vendor','Vendor@postVendorData')->name('postVendor');

Auth::routes();
// Route::get('/logout','LoginController@logout');
Route::get('/logout','Apply@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
