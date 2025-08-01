<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertiController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SettingController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Mail\TestMail;

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

// Route::get('/debug-mail', function () {
//     return [
//         'MAIL_MAILER' => config('mail.default'),
//         'MAIL_HOST' => config('mail.mailers.smtp.host'),
//         'MAIL_PORT' => config('mail.mailers.smtp.port'),
//         'MAIL_USERNAME' => config('mail.mailers.smtp.username'),
//     ];
// });


// Route::get('/send-test-mail', function () {
//     Mail::to('test@example.com')->send(new TestMail());
//     return 'Test email sent!';
// });


// Route::get('/clear-config', function () {
//     Artisan::call('config:clear');
//     Artisan::call('config:cache');
//     return 'config cleared!';
// });

// Route::get('/test-mail', function () {
//     Mail::raw('Hello from Gmail SMTP.', function ($message) {
//         $message->to('akkirathore3110@gmail.com')
//                 ->subject('Test Email');
//     });

//     return 'Test email sent!';
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(HomeController::class)->group(function(){
    Route::get('/about', 'about')->name('about');
    Route::get('/service', 'service')->name('service');
    Route::get('/project', 'project')->name('project');
    Route::get('/show-project/{id}', 'ShowProject')->name('show.project');
    Route::get('/certificates', 'certificates')->name('certificates');
    Route::get('/contact', 'contact')->name('contact');
});

route::controller(ContactController::class)->group(function(){
    Route::post('/sent-email', 'StoreForm')->name('store.form');
    Route::get('admin/email-list', 'EmailList')->middleware('auth')->name('email.list');
    Route::get('admin/view-email/{id}', 'ViewEmail')->middleware('auth')->name('view.email');
    Route::post('admin/email-reply/{id}/reply', 'MailReply')->middleware('auth')->name('reply.email');
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

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::controller(ProfileController::class)->group(function(){
    Route::get('admin/profile', 'Profile')->middleware('auth')->name('profile');
    Route::get('admin/edit-profile', 'EditProfile')->middleware('auth')->name('profile.edit');
    Route::post('admin/update-profile', 'UpdateProfile')->middleware('auth')->name('profile.update');
    Route::get('admin/change-pass', 'ChangePassword')->Middleware('auth')->name('change.pass.show');
    Route::post('admin/update-pass', 'UpdatePass')->middleware('auth')->name('password.change');
});

Route::controller(ProjectController::class)->group(function(){
    Route::get('admin/add-project', 'AddProject')->middleware('auth')->name('add.project');
    Route::post('admin/store-project', 'StoreProject')->middleware('auth')->name('store.project');
    Route::get('admin/edit-project/{id}', 'EditProject')->middleware('auth')->name('edit.project');
    Route::post('admin/update-project/{id}', 'updateProject')->middleware('auth')->name('update.project');
    Route::get('admin/delete-project/{id}', 'DeleteProject')->middleware('auth')->name('delete.project');
    Route::get('admin/project-list', 'ProjectList')->middleware('auth')->name('project.list');
    Route::get('admin/view-project/{id}','ProjectView')->middleware('auth')->name('view.project');
});

Route::controller(SettingController::class)->group(function(){
    Route::get('/admin/site-setting', 'SiteSetting')->middleware('auth')->name('site.setting');
    Route::post('/admin/store-setting', 'saveSetting')->middleware('auth')->name('store.setting');
});

Route::controller(CertiController::class)->group(function(){
    Route::get('/admin/add-certificate', 'AddCerti')->middleware('auth')->name('add.certificate');
    Route::post('/admin/store-certificate', 'StoreCerti')->middleware('auth')->name('save.certificate');
    Route::get('/admin/delete-certificate/{id}', 'DeleteCerti')->middleware('auth')->name('delete.certificate');
    Route::get('/admin/certificate-list', 'CertiList')->middleware('auth')->name('list.certificate');
});