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
    Route::group(['prefix' => 'district'], function () {
        Route::post('/get-district', [
            'uses' => 'ApiDistrictController@index',
            'as' => 'api.district.index'
        ]);

        Route::get('/get-district/{district}', [
            'uses' => 'ApiDistrictController@show',
            'as' => 'api.district.show'
        ]);
    });
});