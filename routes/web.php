<?php

use App\Http\Controllers\DataGuruController;
use App\Http\Controllers\DataKelasController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiSiswaController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\SettingAkunController;
use App\Http\Controllers\TahunJenisUjian;
use App\Http\Controllers\TahunJenisUjianController;
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

// auth
Route::get('/', [OverviewController::class, 'index'])->middleware('auth');
Route::resource('/setting', SettingAkunController::class)->middleware('auth');

// admin
Route::resource('/dataguru', DataGuruController::class)->middleware('admin');
Route::resource('/datasiswa', DataSiswaController::class)->middleware('admin');
Route::resource('/datakelas', DataKelasController::class)->middleware('admin');
Route::resource('/tahunjenis', TahunJenisUjianController::class)->middleware('admin');

//guru
Route::resource('/nilaisiswa', NilaiSiswaController::class)->middleware('guru');

// guest
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'auth'])->middleware('guest');
Route::get('/registrasi', [LoginController::class, 'regist'])->middleware('guest')->name('regist');
Route::post('/registrasi', [LoginController::class, 'registrasi'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
