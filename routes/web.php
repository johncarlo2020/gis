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

Route::get('/', function () { return view('auth/login');});

Route::get('/qualification/subject', function () {
    return view('qualification.subject');
})->name('qualification.subject');

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function (){

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('scholarship/show', [ScholarshipController::class, 'index'])->name('admin.scholarship.show');
        Route::get('Qualification/show', [QualificationController::class, 'index'])->name('admin.qualification.show');
        Route::get('Disability/show', [DisabilityController::class, 'index'])->name('admin.disability.show');
        Route::get('Classification/show', [ClassificationController::class, 'index'])->name('admin.classification.show');
        Route::get('Student/show', [StudentController::class, 'index'])->name('admin.student.show');
        Route::get('Student/add', [StudentController::class, 'create'])->name('admin.student.add');
        Route::get('Student/{id}/edit', [StudentController::class, 'edit'])->name('admin.student.edit');
        Route::PUT('Student/update/{id}', [StudentController::class, 'update'])->name('admin.student.update');



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
// user
Route::post('/ajax/user-reload', [UserController::class, 'reload']);
Route::post('/ajax/user-create', [UserController::class, 'store']);
Route::post('/ajax/user-edit', [UserController::class, 'edit']);
Route::post('/ajax/user-view', [UserController::class, 'view']);
Route::post('/ajax/user-delete', [UserController::class, 'destroy']);
Route::post('/ajax/user-validate_username', [UserController::class, 'username_validate']);
Route::post('/ajax/user-validate_username_edit', [UserController::class, 'username_validate_edit']);
// Scholarship
Route::post('/ajax/scholarship-validate_scholarshipname_edit', [scholarshipController::class, 'name_validate_edit'])->name('scholarship_validate_edit');
Route::post('/ajax/scholarship-validate_scholarshipname', [scholarshipController::class, 'name_validate'])->name('scholarship_validate');
Route::post('/ajax/scholarship-create', [scholarshipController::class, 'store'])->name('scholarship_store');
Route::post('/ajax/scholarship-reload', [scholarshipController::class, 'reload'])->name('scholarship_reload');
Route::post('/ajax/scholarship-view', [scholarshipController::class, 'view'])->name('scholarship_view');
Route::post('/ajax/scholarship-edit', [scholarshipController::class, 'update'])->name('scholarship_update');
Route::post('/ajax/scholarship-delete', [scholarshipController::class, 'destroy'])->name('scholarship_destroy');

Route::post('/ajax/qualification-validate_qualificationname_edit', [qualificationController::class, 'name_validate_edit'])->name('qualification_validate_edit');
Route::post('/ajax/qualification-validate_qualificationname', [qualificationController::class, 'name_validate'])->name('qualification_validate');
Route::post('/ajax/qualification-create', [qualificationController::class, 'store'])->name('qualification_store');
Route::post('/ajax/qualification-reload', [qualificationController::class, 'reload'])->name('qualification_reload');
Route::post('/ajax/qualification-view', [qualificationController::class, 'view'])->name('qualification_view');
Route::post('/ajax/qualification-edit', [qualificationController::class, 'update'])->name('qualification_update');
Route::post('/ajax/qualification-delete', [qualificationController::class, 'destroy'])->name('qualification_destroy');
// disability
Route::post('/ajax/disability-reload', [DisabilityController::class, 'reload'])->name('disability_reload');
Route::post('/ajax/disability-view', [DisabilityController::class, 'view'])->name('disability_view');
Route::post('/ajax/disability-show', [DisabilityController::class, 'show'])->name('disability_show');

Route::post('/ajax/disability-validate_name', [DisabilityController::class, 'validate_name'])->name('disability_validate');
Route::post('/ajax/disability-store', [DisabilityController::class, 'store'])->name('disability_store');
Route::post('/ajax/disability-edit', [DisabilityController::class, 'update'])->name('disability_edit');
Route::post('/ajax/disability-status', [DisabilityController::class, 'destroy'])->name('disability_status');
