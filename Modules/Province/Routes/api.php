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
    Route::group(['prefix' => 'province'], function () {
        Route::get('/get-province', [
            'uses' => 'ApiProvinceController@index',
            'as' => 'api.province.index'
        ]);

        Route::get('/get-province/{prov}', [
            'uses' => 'ApiProvinceController@show',
            'as' => 'api.province.show'
        ]);
    });
});