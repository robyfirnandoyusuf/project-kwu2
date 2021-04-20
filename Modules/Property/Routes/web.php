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

Route::group(['middleware' => 'isadmin', 'prefix' => 'admin/property'], function () {
        Route::get('/index', [
            'uses' => 'PropertyController@index',
            'as' => 'admin.property.index'
        ]);

        Route::post('/destroy/{property}', [
            'uses' => 'PropertyController@destroy',
            'as' => 'admin.property.destroy'
        ]);

        // datatable
        Route::get('/dt-property', [
            'uses' => 'PropertyController@datatable',
            'as' => 'admin.dt.property'
        ]);

        // Edit popup
        Route::get('/popup/edit', [
            'uses' => 'PropertyController@edit_popup',
            'as' => 'admin.popup.property.edit'
        ]);
        Route::post('/popup/edit/{property}', [
            'uses' => 'PropertyController@update_status',
            'as' => 'admin.popup.property.update'
        ]);

        Route::post('/popup/delete-image/', [
            'uses' => 'PropertyController@delete_image',
            'as' => 'admin.popup.property.delete_image'
        ]);
});
