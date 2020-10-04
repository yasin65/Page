<?php

use Illuminate\Support\Facades\Route;

Route::get('/yasin', 'FrontendController@yasin');
Route::get('/', 'FrontendController@index')->name('front');
Route::get('index','SearchController@search');


Route::get('/about', 'FrontendController@about')->name('front.about');
Route::get('/contact', 'FrontendController@contact')->name('front.contact');
Route::get('/post/{slug}', 'FrontendController@post')->name('front.post');
Route::get('/category/{slug}', 'FrontendController@category')->name('front.category');
Route::get('/tag/{slug}', 'FrontendController@tag')->name('front.tag');


Auth::routes();
Route::get('/admin', 'HomeController@index')->name('admin');

Route::group(['prefix' => 'admin'], function() { 

Route::resource('/category', 'CategoryController');
Route::resource('/tag', 'tagController');
Route::resource('/post', 'PostController');


});