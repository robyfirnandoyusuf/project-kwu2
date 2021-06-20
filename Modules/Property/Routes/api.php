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

Route::group(['prefix'=>'v1'], function () {
    Route::group(['middleware' => ['jwt.verify']], function() {

        Route::get('/test-midtrans', [
            'uses' => 'APIPropertyController@test_midtrans',
            'as' => 'api.property.test-midtrans'
        ]);

        Route::group(['prefix' => 'mitra/property'], function () {
            Route::get('/', [
                'uses' => 'APIPropertyController@index',
                'as' => 'api.mitra.property.index'
            ]);
    
            Route::post('/', [
                'uses' => 'APIPropertyController@store',
                'as' => 'api.mitra.property.store'
            ]);
    
            Route::get('/{property}', [
                'uses' => 'APIPropertyController@show',
                'as' => 'api.mitra.property.show'
            ]);
    
            Route::put('/{property}', [
                'uses' => 'APIPropertyController@update',
                'as' => 'api.mitra.property.update'
            ]);
    
            Route::delete('/{property}', [
                'uses' => 'APIPropertyController@destroy',
                'as' => 'api.mitra.property.destroy'
            ]);
        });
    });

    Route::group(['prefix' => 'property'], function() {
        Route::get('/', [
            'uses' => 'APIPropertyController@public_index',
            'as' => 'api.property.index'
        ]);

        Route::get('/{property}', [
            'uses' => 'APIPropertyController@public_show',
            'as' => 'api.property.show'
        ]);
    });

});