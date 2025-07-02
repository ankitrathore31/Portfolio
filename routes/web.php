<?php

use App\Http\Controllers\HomeController;
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
