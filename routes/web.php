<?php

use App\Http\Controllers\Appointmentcontoller;
use App\Http\Controllers\AuthController;
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
    return view('welcome');
});

 Route::post('/', [Appointmentcontoller::class,'save'])->name('save.appointment');

 Route::get('/doctor/login', function(){
    return view('doctor.Auth.login');
 })->name('doctor.login');

Route::get('/doctor/registration', function(){
    return view('doctor.Auth.includes.signup');
})->name('doctor.registration');

Route::get('/doctor/dashboard', function(){
    return view('doctor.Layout.dashboard');
});

Route::post('/doctor/registration',[AuthController::class,'savedoc'])->name('doctor.registration.save');
Route::post('/doctor/login/save',[AuthController::class,'DocLogin'])->name('doctor.login.save');