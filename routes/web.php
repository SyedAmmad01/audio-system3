<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();




// Route::get('/index',[App\Http\Controllers\UserPlansController::class, 'index'])->name('user.index');



Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::view('/login', 'admin.login')->name('admin.login');
        Route::post('/login', [App\Http\Controllers\AdminController::class, 'authenticate'])->name('admin.auth');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
    });
});


Route::group(['middleware' => 'user'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/user/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');
    Route::get('/user/excel_upload_index', [App\Http\Controllers\NumberController::class, 'excel_upload_index'])->name('user.excel_upload_index');
    Route::get('/user/check', [App\Http\Controllers\NumberController::class, 'check'])->name('user.check');
    Route::get('/user/excel_download', [App\Http\Controllers\NumberController::class, 'excel_download'])->name('user.excel_download');
    Route::post('/user/checking', [App\Http\Controllers\NumberController::class, 'checking'])->name('user.checking');
    Route::post('/user/checking/UpdateNumberSequence', [App\Http\Controllers\NumberController::class, 'UpdateNumberSequence'])->name('user.checking.UpdateNumberSequence');
    Route::post('/user/import-excel', [App\Http\Controllers\NumberController::class, 'import_excel'])->name('import.excel');



    // Audio Controller Routes
    Route::get('/user/audio_check', [App\Http\Controllers\AudioController::class, 'audio_check'])->name('user.audio_check');
    Route::get('/user/audio_upload_index', [App\Http\Controllers\AudioController::class, 'audio_upload_index'])->name('user.audio_upload_index');
    Route::get('/user/get_audio', [App\Http\Controllers\AudioController::class, 'get_audio'])->name('user.get_audio');
    Route::post('/user/import-audio', [App\Http\Controllers\AudioController::class, 'import_audio'])->name('import.audio');
    // Audio Controller Routes



});
