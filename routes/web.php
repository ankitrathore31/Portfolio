<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(HomeController::class)->group(function(){
    Route::get('/about', 'about')->name('about');
    Route::get('/service', 'service')->name('service');
    Route::get('/project', 'project')->name('project');
    Route::get('/certificates', 'certificates')->name('certificates');
    Route::get('/contact', 'contact')->name('contact');
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/register','registerPage')->name('register.show');
    Route::post('/register', 'register')->name('register');
    Route::get('/login', 'loginPage')->name('login.page');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/forgot-pass', 'ForgotPass')->name('password.forgot');
    Route::post('/forgot-pass/send-otp','sendOtp')->name('password.otp.send');
    Route::get('/reset-pass','ResetPassPage')->name('password.reset.page');
    Route::post('/forgot-pass/reset','ResetPassWithOtp')->name('password.otp.reset');
});


Route::controller(AdminController::class)->group(function(){
    Route::get('/admin', 'admin')->middleware('auth')->name('admin');
});

Route::controller(ProfileController::class)->group(function(){
    Route::get('admin/profile', 'Profile')->middleware('auth')->name('profile');
    Route::get('admin/edit-profile', 'EditProfile')->middleware('auth')->name('profile.edit');
    Route::post('admin/update-profile', 'UpdateProfile')->middleware('auth')->name('profile.update');
    Route::get('admin/change-pass', 'ChangePassword')->Middleware('auth')->name('change.pass.show');
    Route::post('admin/update-pass', 'UpdatePass')->middleware('auth')->name('password.change');
});