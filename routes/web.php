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

/*Route::get('/', function () {
    return view('welcome');
});*/

/*Route::group([ 'middleware' => 'auth'], function(){

});*/

Route::GET('/cabinet','ArticleController@index');


Route::GET('/articles','ArticleController@index')->name('home');
Route::GET('/articles/create','ArticleController@create');
Route::GET('/articles/{id}','ArticleController@show');
Route::POST('/articles','ArticleController@store');
Route::GET('/user/{id}','UserController@show');

Route::POST('/subscription/{id}','SubscriptionController@store');

Auth::routes();
Route::get('/', 'HomeController@index');
