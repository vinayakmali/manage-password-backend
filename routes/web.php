<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


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


Route::resource('projects', ProjectController::class);
Route::resource('business', BusinessController::class);
Route::resource('category', CategoryController::class);
Route::resource('service', ServiceController::class);

Route::get('/business/view/{slug}', 'App\Http\Controllers\BusinessController@view');
Route::get('/business/selectservice/{slug}', 'App\Http\Controllers\BusinessController@view');
Route::get('/business/enquiry/{slug}', 'App\Http\Controllers\BusinessController@enquiry');

Route::post('contact-form', 'App\Http\Controllers\BusinessController@saveenquiry');
// Route::resource('projects', 'ProjectController');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();
//Auth::routes(['verify' => true]);


Route::get('register', [RegisterController::class, 'register']);
Route::post('register', [RegisterController::class, 'store'])->name('register');

Route::get('login', [LoginController::class, 'login']);
Route::post('login', [LoginController::class, 'store'])->name('login');
Route::get('home', [LoginController::class, 'home'])->name('home');


Route::get('forget-password', [ForgotPasswordController::class, 'getEmail']);
Route::post('forget-password', [ForgotPasswordController::class, 'postEmail']);

Route::get('reset-password/{token}', [ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [ResetPasswordController::class, 'updatePassword']);
