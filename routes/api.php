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
Route::post('/register', 'API\RegisterController@store')->middleware('client');


Route::group(['middleware' => ['auth:api']], function () {

    // tweets
    Route::post('/tweets', 'API\TweetController@store');

    Route::delete('/tweets/{tweet}', 'API\TweetController@destroy')->middleware('can:update,tweet');

    // follow
    Route::post('/users/{user}/followers', 'API\FollowerController@store');

    // timeline
    Route::get('/home', 'API\HomeController@index');
});






