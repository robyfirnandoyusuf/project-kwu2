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
    Route::group(['prefix' => 'user'], function () {
        Route::post('post-user', [
            'uses' => 'ApiUserController@update',
            'as' => 'api.user.post-user'
        ]);

        Route::get('get-user', [
            'uses' => 'ApiUserController@show',
            'as' => 'api.user.get-user'
        ]);
    });
});