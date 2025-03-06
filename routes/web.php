<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\CustomerController;
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

//web api routes

Route::get('/',[UserController::class,'homePage']);



// Login page routes
Route::post('/user-registration', [UserController::class, 'UserRegistration']);
Route::get('/userRegistration',[UserController::class,'RegistrationPage']);
Route::post('/user-login', [UserController::class, 'UserLogin']);
Route::get('/userLogin',[UserController::class,'LoginPage']);
Route::post('/send-otp', [UserController::class, 'SendOtpCode']);
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::post('/verify-otp', [UserController::class, 'VerifyOtpCode']);
Route::get('/verifyOtp',[UserController::class,'VerifyOtpPage']);
Route::post('/reset-password', [UserController::class, 'ResetPassword']);
Route::get('/resetPassword',[UserController::class,'ResetPassPage']);

//Logout Routes
Route::get('/logout', [UserController::class, 'UserLogout']);

//dashboard page routes
Route::get('/dashboard',[DashboardController::class,'DashboardPage'])->middleware([TokenVerificationMiddleware::class]);

//Profile Page Route
Route::get('/userProfile',[UserController::class,'ProfilePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/user-profile', [UserController::class, 'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update', [UserController::class, 'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);

//Category Routes
Route::get('categoryPage',[categoryController::class,'CategoryPage'])->middleware([TokenVerificationMiddleware::class]);
Route::post('create-category',[categoryController::class,'CreateCategory'])->middleware([TokenVerificationMiddleware::class]);
Route::post('update-category',[categoryController::class,'updateCategory'])->middleware([TokenVerificationMiddleware::class]);
Route::delete('delete_category/{id}',[categoryController::class,'DeleteCategory'])->middleware([TokenVerificationMiddleware::class]);
Route::get('list-category',[categoryController::class.'categoryList'])->middleware([TokenVerificationMiddleware::class]);


//Customer Page Route
Route::get('customer_list',[CustomerController::class,'CustomerList'])->middleware([TokenVerificationMiddleware::class]);
Route::get('customerPage',[CustomerController::class,'CustomerPage'])->middleware([TokenVerificationMiddleware::class]);
Route::post('create-customer',[CustomerController::class,'CreateCustomer'])->middleware([TokenVerificationMiddleware::class]);
Route::post('update-customer',[CustomerController::class,'UpdateCustomer'])->middleware([TokenVerificationMiddleware::class]);
Route::delete('delete-customer/{id}',[CustomerController::class,'DeleteCustomer'])->middleware([TokenVerificationMiddleware::class]);