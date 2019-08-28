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

// register
Route::post('/register','API\RegisterController@store')->middleware('client')->middleware('localization');
// tweets
Route::post('/tweets','API\TweetController@store')->middleware('auth:api')->middleware('localization');;
Route::delete('/tweets/{tweet}','API\TweetController@destroy')->middleware('can:update,tweet')->middleware('auth:api')->middleware('localization');;
// follow
Route::post('/users/{user}/follower','API\FollowerController@store')->middleware('auth:api')->middleware('localization');;

// timeline
Route::get('/home','API\HomeController@index')->middleware('auth:api')->middleware('localization');;
