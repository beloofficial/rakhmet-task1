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


Route::post('/register','RegisterController@register');


Route::group(['prefix'=>'categories'],function(){
	Route::get('/','CategoryController@index');
	Route::get('/{category}','CategoryController@getGoods');
	Route::post('/','CategoryController@store')->middleware('auth:api');
	Route::patch('/{category}','CategoryController@update')->middleware('auth:api');
	Route::delete('/{category}','CategoryController@destroy')->middleware('auth:api');

});

Route::group(['prefix'=>'goods'],function(){
	
	Route::post('/','GoodController@store')->middleware('auth:api');
	Route::patch('/{good}','GoodController@update')->middleware('auth:api');
	Route::delete('/{good}','GoodController@destroy')->middleware('auth:api');
	
});


Route::group(['prefix'=>'attributes'],function(){
	Route::get('/','AttributeController@index');
	Route::get('/{attribute}','AttributeController@getGoods');
	Route::post('/','AttributeController@store')->middleware('auth:api');
	Route::patch('/{attribute}','AttributeController@update')->middleware('auth:api');
	Route::delete('/{attribute}','AttributeController@destroy')->middleware('auth:api');
});

Route::put('/admin','AdminController@change')->middleware('auth:api');




