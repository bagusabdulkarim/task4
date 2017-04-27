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
Route::resource('comments', 'CommentsController');
Route::resource('articles', 'ArticlesController');

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('importExport', 'ArticlesController@importExport')->name('importExport');

Route::get('downloadExcel/{type}', 'ArticlesController@downloadExcel')->name('downloadExcel');

Route::post('importExcel', 'ArticlesController@importExcel');

Route::resource('/image', 'ImageController');
Route::DELETE('image/', 'ImageController@destroy'); 


