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

Route::group(['prefix'=>'v1', 'middleware' => ['api', 'jwt.verify']], function () {
    Route::group(['prefix' => 'rent'], function () {
        Route::post('get-rent', [
            'uses' => 'ApiRentController@index',
            'as' => 'api.rent.get-rent'
        ]);
        Route::post('store-rent', [
            'uses' => 'ApiRentController@store',
            'as' => 'api.rent.post-rent'
        ]);
        Route::put('/{rent}', [
            'uses' => 'ApiRentController@update',
            'as' => 'api.rent.update-rent'
        ]);
    });
});