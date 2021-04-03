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
    Route::group(['prefix' => 'property'], function () {
        Route::get('/', [
            'uses' => 'APIPropertyController@index',
            'as' => 'api.property.index'
        ]);

        Route::post('/', [
            'uses' => 'APIPropertyController@store',
            'as' => 'api.property.store'
        ]);

        Route::get('/{property}', [
            'uses' => 'APIPropertyController@show',
            'as' => 'api.property.show'
        ]);

        Route::put('/{property}', [
            'uses' => 'APIPropertyController@update',
            'as' => 'api.property.update'
        ]);
    });
});