<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\SettingAkunController;
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

Route::get('/', [OverviewController::class, 'index'])->middleware('auth');
// Route::post('/', [OverviewController::class, 'index'])->middleware('auth');
Route::get('/dataguru', function () {
    return 'Data Guru';
})->middleware('admin');
Route::resource('/setting', SettingAkunController::class)->middleware('auth');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::post('/login', [LoginController::class, 'auth'])->middleware('guest');
