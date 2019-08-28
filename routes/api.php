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
// register
Route::post('/register','API\RegisterController@store')->middleware('client');
// tweets
Route::post('/tweets','API\TweetController@store')->middleware('auth:api');
Route::delete('/tweets/{tweet}','API\TweetController@destroy')->middleware('can:update,tweet')->middleware('auth:api');
