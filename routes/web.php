<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\DisabilityController;
use App\Http\Controllers\ClassificationController;
use App\Http\Controllers\StudentController;





// users 
use App\Http\Controllers\userAdmin;
use App\Http\Controllers\userEncoder;
use App\Http\Controllers\userRegistrar;

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
        return view('auth/login');
});

Auth::routes();



Route::group(['middleware' => 'auth'], function (){

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('scholarship/show', [ScholarshipController::class, 'index'])->name('admin.scholarship.show');
        Route::get('Qualification/show', [QualificationController::class, 'index'])->name('admin.qualification.show');
        Route::get('Disability/show', [DisabilityController::class, 'index'])->name('admin.disability.show');
        Route::get('Classification/show', [ClassificationController::class, 'index'])->name('admin.classification.show');
        Route::get('Student/show', [StudentController::class, 'index'])->name('admin.student.show');
        // =================================================================================================================================
        //admin routes
        Route::get('userAdmin/index', [HomeController::class, 'AdminHome'])->name('admin.home')->middleware('userAdmin');

        Route::group(['middleware' => ['userAdmin']], function() {
                Route::get('userAdmin/user', [UserController::class, 'index'])->name('admin.user');
        });

        // =================================================================================================================================
        //encoder routes
        Route::get('userRegistrar/index', [HomeController::class, 'RegistrarHome'])->name('registrar.home')->middleware('userEncoder');

        Route::group(['middleware' => ['userAdmin']], function() {
                Route::get('userAdmin/user', [UserController::class, 'index'])->name('admin.user');
        });

        // =================================================================================================================================
        //registrar routes
        Route::get('userEncoder/index', [HomeController::class, 'EncoderHome'])->name('encoder.home')->middleware('userRegistrar');

        Route::group(['middleware' => ['userAdmin']], function() {
                Route::get('userAdmin/user', [UserController::class, 'index'])->name('admin.user');
        });
        // =================================================================================================================================

});





// ajax
Route::post('/ajax/user-reload', [UserController::class, 'reload']);
Route::post('/ajax/user-create', [UserController::class, 'store']);
Route::post('/ajax/user-edit', [UserController::class, 'edit']);
Route::post('/ajax/user-view', [UserController::class, 'view']);
Route::post('/ajax/user-delete', [UserController::class, 'destroy']);
Route::post('/ajax/user-validate_username', [UserController::class, 'username_validate']);






