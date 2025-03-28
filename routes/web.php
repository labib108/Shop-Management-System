<?php
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\ReportController;
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

//Customer Page Route
Route::get('customer_list',[CustomerController::class,'CustomerList'])->middleware([TokenVerificationMiddleware::class]);
Route::get('customerPage',[CustomerController::class,'CustomerPage'])->middleware([TokenVerificationMiddleware::class]);
Route::post('create-customer',[CustomerController::class,'CreateCustomer'])->middleware([TokenVerificationMiddleware::class]);
Route::post('update-customer',[CustomerController::class,'UpdateCustomer'])->middleware([TokenVerificationMiddleware::class]);
Route::delete('delete-customer/{id}',[CustomerController::class,'DeleteCustomer'])->middleware([TokenVerificationMiddleware::class]);

//Category Routes
Route::get('categoryPage',[categoryController::class,'CategoryPage'])->middleware([TokenVerificationMiddleware::class]);
Route::post('create-category',[categoryController::class,'CreateCategory'])->middleware([TokenVerificationMiddleware::class]);
Route::post('update-category',[categoryController::class,'updateCategory'])->middleware([TokenVerificationMiddleware::class]);
Route::delete('delete_category/{id}',[categoryController::class,'DeleteCategory'])->middleware([TokenVerificationMiddleware::class]);
Route::get('list-category',[categoryController::class,'categoryList'])->middleware([TokenVerificationMiddleware::class]);

//Product Routes
Route::get('productPage',[ProductController::class,'ProductPage'])->middleware([TokenVerificationMiddleware::class]);
Route::post('create-product',[ProductController::class,'CreateProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::post('update-product',[ProductController::class,'UpdateProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::delete('delete-product',[ProductController::class,'DeleteProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::get('list-product',[ProductController::class,'ProductList'])->middleware([TokenVerificationMiddleware::class]);

//Invoice Routes
Route::get('select-invoice',[InvoiceController::class,'SelectInvoice'])->middleware([TokenVerificationMiddleware::class]);
Route::post('create-invoice',[InvoiceController::class,'CreateInvoice'])->middleware([TokenVerificationMiddleware::class]);
Route::post('details-invoice',[InvoiceController::class,'DetailsInvoice'])->middleware([TokenVerificationMiddleware::class]);
Route::post('delete-invoice',[InvoiceController::class,'DeleteInvoice'])->middleware([TokenVerificationMiddleware::class]);

Route::get('invoicePage',[InvoiceController::class,'ShowInvoice'])->middleware([TokenVerificationMiddleware::class]);
Route::post('invoice-generate',[InvoiceController::class,'InvoiceGeneration'])->middleware([TokenVerificationMiddleware::class]);
Route::get('invoiceGenerate/{invoice_id}/{customer_id}',[InvoiceController::class,'GenerateInvoice'])->middleware([TokenVerificationMiddleware::class]);

//Sales Page
Route::get('salesPage',[InvoiceController::class,'CreateSales'])->middleware([TokenVerificationMiddleware::class]);
Route::get('reportPage',[ReportController::class,'ReportPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('sales-report/{fromDate}/{toDate}',[ReportController::class,'SalesReport'])->middleware([TokenVerificationMiddleware::class]);


