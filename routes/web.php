<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\auth\EmailVerification;
use App\Http\Controllers\auth\PasswordResetController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


//Route logout
Route::post('/logout', [ LoginController::class, 'logout' ])->name('logout.store');

//Route forgot password
Route::get('/forgot-password', [ PasswordResetController::class, 'risetlinkreq' ])->name('password.request');
Route::post('/forgot-password', [ PasswordResetController::class, 'submitemail' ])->name('password.email');
Route::get('/forgot-password/preview', [ PasswordResetController::class, 'forgotpasswordpreview' ])->name('password.reset.preview');
Route::get('/reset-password/{token}', [ PasswordResetController::class, 'risettingpassword' ])->name('password.reset');
Route::post('/reset-password', [ PasswordResetController::class, 'submitnewpassword' ])->name('password.update');

Route::middleware([ 'guest' ])->group(function () {
    //Route login
    Route::get('/', function () {
        return view('auth.login');
    })->name('login');
    Route::post('/login', [ LoginController::class, 'login' ])->name('login.store');

    //Route register
    Route::get('/register', [ RegisterController::class, 'index' ])->name('register.index');
    Route::post('/register/post', [ RegisterController::class, 'store' ])->name('register.store');
});

Route::middleware('auth')->group(function () {
    //Route home
    Route::get('/home', [ HomeController::class, 'home' ])->name('home');

    //Route email verification
    Route::get('/email/verify', [ EmailVerification::class, 'index' ])->middleware('emailVerifyAccess')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [ EmailVerification::class, 'verifemail' ])->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [ EmailVerification::class, 'resendemail' ])->middleware('throttle:6,1')->name('verification.resend');

    //Route account
    Route::get('/account', [ AccountController::class, 'index' ])->name('account.index');
    Route::post('/account/update', [ AccountController::class, 'updateaccount' ])->name('account.update');

    //Route Company
    Route::get('/company', [ CompanyController::class, 'index' ])->name('company.index');

    //Route dashboard
    Route::middleware([ 'user:P', 'verified' ])->group(function () {
        Route::get('/admin', function () {
            $user = User::all();
            return view('dashboard', compact('user'));
        })->name('dashboard');

        //Route company update
        Route::post('/company/update', [ CompanyController::class, 'updatecompany' ])->name('company.update');
    });
    Route::middleware([ 'user:C', 'verified' ])->group(function () {
        Route::get('/user', function () {
            return view('welcome');
        })->name('welcome');
    });
});
