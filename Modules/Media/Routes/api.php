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

Route::group(['prefix'=>'v1', 'middleware' => 'api'], function () {
    Route::group(['prefix' => 'media'], function () {
        Route::get('/', [
            'uses' => 'APIMediaController@index',
            'as' => 'api.media.get'
        ]);
    });
});