<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CityController,
    MediaController,
};
use App\Http\Controllers\Admin\{
    LoginController,
    AdminController,
    PropertyController
};
use App\Http\Controllers\Frontend\{
    HomeController
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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/auth', [LoginController::class, 'index'])->name('admin.auth.get');
    Route::post('/auth/post', [LoginController::class, 'show'])->name('admin.auth.post');
    Route::get('/auth/logout', [LoginController::class, 'destroy'])->name('admin.auth.logout');

    Route::group(['middleware' => 'isadmin'], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        Route::group(['prefix' => 'property'], function () {
            Route::get('/index', [PropertyController::class, 'index'])->name('admin.property.index');
            Route::get('/create', [PropertyController::class, 'create'])->name('admin.property.create');
            Route::get('/edit/{id}', [PropertyController::class, 'edit'])->name('admin.property.edit');
            Route::post('/store', [PropertyController::class, 'store'])->name('admin.property.store');
            Route::post('/update/{id}', [PropertyController::class, 'update'])->name('admin.property.update');

            // datatable
            Route::get('/dt-property', [PropertyController::class, 'datatable'])->name('admin.dt.property');
        });
    });

    Route::post('/upload-media', [MediaController::class, 'store'])->name('admin.media.store');
    Route::delete('/destroy-media/{uid}', [MediaController::class, 'destroy'])->name('admin.media.destroy');
});

Route::get('/', [HomeController::class, 'index']);
Route::post('/get-city', [CityController::class, 'index'])->name('select.city');