<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerificationController;

Route::get('/', function () {
    return view('auth.send-code');
})->name('send.validation.code');

Route::get('/verify-validation-code', function () {
    return view('auth.verify-code');
})->name('verify.validation.code');

Route::post('/', [VerificationController::class, 'loginValidation'])->name('send.validation.code');

Route::post('/verify-validation-code', [VerificationController::class, 'verifyCode'])->name('verify.validation.code');

Route::get('/welcome', [VerificationController::class, 'welcome'])
    ->name('welcome')
    ->middleware('auth');
