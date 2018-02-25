<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth:api'], function() {
    Route::GET('/articles','ArticleController@index');
    Route::GET('/articles/create','ArticleController@create');
    Route::POST('/articles','ArticleController@store');
    Route::GET('/user/{name}','ArticleController@index');

});