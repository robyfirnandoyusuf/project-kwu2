<?php

use Illuminate\Http\Request;
use Modules\Auth\Http\Controllers\{
    ApiAuthController
};
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
    Route::group(['prefix' => 'auth'], function () {
        Route::post('post-auth', [
            'uses' => 'ApiAuthController@show',
            'as' => 'api.auth.post-auth'
        ]);
    });

    Route::group(['prefix' => 'register'], function () {
        Route::post('post-register', [
            'uses' => 'ApiRegisterController@storeRegister',
            'as' => 'api.auth.post-register'
        ]);
    });
});
