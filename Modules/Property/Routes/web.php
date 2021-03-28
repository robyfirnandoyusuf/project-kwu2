<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Modules\Property\Http\Controllers\{
    PropertyController
};

Route::group(['middleware' => 'isadmin', 'prefix' => 'admin/property'], function () {
        Route::get('/index', [
            'uses' => 'PropertyController@index',
            'as' => 'admin.property.index'
        ]);
        Route::get('/create', [
            'uses' => 'PropertyController@create',
            'as' => 'admin.property.create'
        ]);
        Route::get('/edit/{id}', [
            'uses' => 'PropertyController@edit',
            'as' => 'admin.property.edit'
        ]);
        Route::post('/store', [
            'uses' => 'PropertyController@store',
            'as' => 'admin.property.store'
        ]);
        Route::post('/update/{id}', [
            'uses' => 'PropertyController@update',
            'as' => 'admin.property.update'
        ]);
        Route::get('/destroy/{id}', [
            'uses' => 'PropertyController@destroy',
            'as' => 'admin.property.destroy'
        ]);

        // datatable
        Route::get('/dt-property', [
            'uses' => 'PropertyController@datatable',
            'as' => 'admin.dt.property'
        ]);
});
