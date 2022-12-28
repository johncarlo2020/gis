<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('useradmin/index', [HomeController::class, 'AdminHome'])->name('admin.home')->middleware('userAdmin');
Route::get('userRegistrar/index', [HomeController::class, 'RegistrarHome'])->name('registrar.home')->middleware('userEncoder');
Route::get('userEncoder/index', [HomeController::class, 'EncoderHome'])->name('encoder.home')->middleware('userRegistrar');