<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\auth\EmailVerification;
use App\Http\Controllers\auth\PasswordResetController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Models\note;
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

    //Route dashboard
    Route::middleware([ 'verified' ])->group(function () {
        Route::post('/note/store', [ NoteController::class, 'store' ])->name('note.store');
        Route::get('/note/{slug}', [ NoteController::class, 'show' ])->name('note.show')->middleware('noteAccess');
        Route::post('/note/update/{slug}', [ NoteController::class, 'update' ])->name('note.update');
        Route::post('/note/destroy/{slug}', [ NoteController::class, 'destroy' ])->name('note.destroy');

        Route::get('/dashboard', function () {
            $note = note::all();
            return view('dashboard', compact('note'));
        })->name('dashboard');
    });
});
