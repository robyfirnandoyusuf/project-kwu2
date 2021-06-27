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
    Route::group(['prefix' => 'favorite'], function () {
        Route::get('get-favorite', [
            'uses' => 'ApiFavoriteController@index',
            'as' => 'api.favorite.get-favorite'
        ]);

        Route::post('store-favorite', [
            'uses' => 'ApiFavoriteController@store',
            'as' => 'api.favorite.post-favorite'
        ]);

        Route::delete('/{property}', [
            'uses' => 'ApiFavoriteController@destroy',
            'as' => 'api.favorite.destroy'
        ]);
    });
});
