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
    Route::group(['prefix' => 'media'], function () {
        Route::get('/', [
            'uses' => 'APIMediaController@index',
            'as' => 'api.media.index'
        ]);

        Route::post('/', [
            'uses' => 'APIMediaController@store',
            'as' => 'api.media.store'
        ]);
    });
});