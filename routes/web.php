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

Route::resource('article', 'ArticleController');

//Route::get('article/delete', 'UserController@delete')->name('delete');
Route::get('article/{article}/update','ArticleController@update')->name('article.update');
//Route::get('page','ArticleController@page')->name('article.page');
//Route::POST('upload','ArticleController@upload')->name('article.upload');