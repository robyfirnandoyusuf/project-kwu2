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

Route::group(['prefix'=>'v1', 'middleware' => ['api']], function () {
    Route::group(['prefix' => 'city'], function () {
        Route::post('/get-city', [
            'uses' => 'ApiCityController@index',
            'as' => 'api.city.index'
        ]);

        Route::get('/get-city/{city}', [
            'uses' => 'ApiCityController@show',
            'as' => 'api.city.show'
        ]);
    });
});