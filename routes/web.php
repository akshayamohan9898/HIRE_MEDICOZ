<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CandidateprofileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\PasswordResetController;


Route::get('/', function() {
    return view('welcome');
})->name('welcome');


Route::get('/register', [RegistrationController::class, 'RegisterIndex'])->name('register');



Route::post('/register', [RegistrationController::class, 'datasubmit'])->name('register.submit');

Route::middleware(['web'])->group(function () {
    Route::get('/login', [LoginController::class, 'LoginIndex'])->name('login.index');
    Route::post('/login', [LoginController::class, 'loginSubmit'])->name('login.submit');
});

Route::get('/verify-otp', [RegistrationController::class, 'verifyOtpPage'])->name('otp.verification');

Route::post('/verify-otp', [RegistrationController::class, 'verifyOtp'])->name('otp.verify');


Route::get('/candidate-dashboard', function () {
    return view('candidate_dashboard'); 
})->name('candidate.dashboard');


Route::get('/edit-profile', [CandidateprofileController::class, 'editProfile'])->name('edit.profile');

Route::post('/edit-profile', [CandidateprofileController::class, 'editsubmit'])->name('candidate.submit');




Route::get('/forgot-password', [ForgotPasswordController::class, 'showVerificationOptions'])->name('password.forgot');


Route::post('/password-verify-option', [ForgotPasswordController::class, 'handleVerification'])->name('password.verify.option');


Route::post('/password-verify-otp', [ForgotPasswordController::class, 'verifyOtp'])->name('password.verify.otp');


Route::get('/reset-password', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('password.reset.form');


Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.reset');

Route::get('/login', [LoginController::class, 'LoginIndex'])->name('login');



