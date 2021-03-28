<?php

use Modules\User\Http\Controllers\{
    // AdminController,
    UserController
};
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

// Route::prefix('cok')->group(function() {
Route::group(['prefix' => 'admin/user'], function () {
    Route::get('/index', [
        'uses' => 'UserController@index', 
        'as' => 'admin.user.index'
    ]);
    Route::get('/create', [
        'uses' => 'UserController@create', 
        'as' => 'admin.user.create'
    ]);
    Route::get('/edit/{user}', [
        'uses' => 'UserController@edit', 
        'as' => 'admin.user.edit'
    ]);
    Route::post('/store', [
        'uses' => 'UserController@store', 
        'as' => 'admin.user.store'
    ]);
    Route::post('/update/{user}', [
        'uses' => 'UserController@update', 
        'as' => 'admin.user.update'
    ]);
    Route::get('/destroy/{user}', [
        'uses' => 'UserController@destroy', 
        'as' => 'admin.user.destroy'
    ]);

    // datatable
    Route::get('/dt-user', [
        'uses' => 'UserController@datatable', 
        'as' => 'admin.dt.user'
    ]);
});
