<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CityController,
    MediaController,
};
use App\Http\Controllers\Admin\{
    LoginController,
    AdminController,
    UserController
};
use App\Http\Controllers\Frontend\{
    HomeController,
    PropertyController as FrontendPropertyController
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

        Route::group(['prefix' => 'user'], function () {
            Route::get('/index', [UserController::class, 'index'])->name('admin.user.index');
            Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
            Route::get('/edit/{user}', [UserController::class, 'edit'])->name('admin.user.edit');
            Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
            Route::post('/update/{user}', [UserController::class, 'update'])->name('admin.user.update');
            Route::get('/destroy/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');

            // datatable
            Route::get('/dt-user', [UserController::class, 'datatable'])->name('admin.dt.user');
        });
    });

    Route::post('/upload-media', [MediaController::class, 'store'])->name('admin.media.store');
    Route::delete('/destroy-media/{uid}', [MediaController::class, 'destroy'])->name('admin.media.destroy');
});

Route::group(['prefix' => 'property'], function () {
    Route::get('show/{property}', [FrontendPropertyController::class, 'show'])->name('frontend.property.show');
});

Route::get('/', [HomeController::class, 'index']);
Route::post('/get-city', [CityController::class, 'index'])->name('select.city');