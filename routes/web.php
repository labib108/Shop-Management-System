<?php

use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('/user-registration', [\App\Http\Controllers\UserController::class, 'UserRegistration']);
Route::post('/user-login', [\App\Http\Controllers\UserController::class, 'UserLogin']);
Route::post('/send-otp', [\App\Http\Controllers\UserController::class, 'SendOtpCode']);
Route::post('/verify-otp', [\App\Http\Controllers\UserController::class, 'VerifyOtpCode']);
Route::post('/reset-password', [\App\Http\Controllers\UserController::class, 'ResetPassword'])
    ->middleware([TokenVerificationMiddleware::class ]);







