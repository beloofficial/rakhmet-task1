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
Route::get('/user','UserController@getUser')->middleware('auth:api');

Route::post('/register','UserController@register');


Route::group(['prefix'=>'categories'],function(){
	
	Route::get('/','CategoryController@index');
	Route::get('/{category}','CategoryController@getGoods');
	
	Route::group(['middleware' => 'auth:api'], function () {
		Route::post('/','CategoryController@store');
		Route::delete('/{category}','CategoryController@destroy');
		Route::patch('/{category}','CategoryController@update');
	});

});

Route::group(['prefix'=>'goods'],function(){
	Route::group(['middleware' => 'auth:api'], function () {
		Route::post('/','GoodController@store');
		Route::patch('/{good}','GoodController@update');
		Route::delete('/{good}','GoodController@destroy');
	});	
	
});


Route::group(['prefix'=>'attributes'],function(){
	Route::get('/','AttributeController@index');
	Route::get('/{attribute}','AttributeController@getGoods');
	
	Route::group(['middleware' => 'auth:api'], function () {	
		Route::post('/','AttributeController@store');
		Route::patch('/{attribute}','AttributeController@update');
		Route::delete('/{attribute}','AttributeController@destroy');
	});
});

Route::group(['middleware' => 'auth:api'], function () {
	Route::put('/admin','AdminController@change');
});


Route::middleware('auth:api')->get('/check', function () {
    return CheckUser::isAdmin();
});

