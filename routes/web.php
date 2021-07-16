<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CityController,
    MediaController,
};
use App\Http\Controllers\Admin\{
    LoginController,
    AdminController
};
use App\Http\Controllers\Frontend\{
    HomeController,
    PropertyController as FrontendPropertyController
};
use LaravelFCM\Message\PayloadNotificationBuilder;

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
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('isadmin')->name('admin.dashboard');

    /* Route::group(['middleware' => 'isadmin'], function () {
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
    }); */

    Route::post('/upload-media', [MediaController::class, 'store'])->name('admin.media.store');
    Route::delete('/destroy-media/{uid}', [MediaController::class, 'destroy'])->name('admin.media.destroy');
});

Route::group(['prefix' => 'property'], function () {
    Route::get('show/{property}', [FrontendPropertyController::class, 'show'])->name('frontend.property.show');
});

Route::get('/', function() {
    return redirect()->route('admin.auth.get');
});
Route::post('/get-city', [CityController::class, 'index'])->name('select.city');

Route::any('/playground', function() {
    $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
          
        $SERVER_API_KEY = 'XXXXXX';
  
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => 'title',
                "body" => 'woi'  
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
  
        dd($response);
    /* $mPenyewa = \App\Models\Mutasi::whereUserId(\Auth::id())->orderBy('id', 'desc');
    \Log::channel('stderr')->debug("debug : " . $mPenyewa->count());
    if ($mPenyewa->count() <= 0) {
        // dd(!empty($mPenyewa->first()));
        $mutasi = new \App\Models\Mutasi();
        $mutasi->user_id = \Auth::id();
        $mutasi->db = 1;
        $mutasi->cr = 1;
        $mutasi->saldo = 31337 + (!empty($mPenyewa->first()) ? $mPenyewa->first()->saldo : 0);
        $mutasi->desc = 'Bayar kos '."xxxx";
        $mutasi->save();
    } */
});