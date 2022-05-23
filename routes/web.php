<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\client\ClientController;
use App\Http\Controllers\client\ClientDashboardController;
use App\Http\Controllers\client\ClientProfileController;
use App\Http\Controllers\rider\RiderController;
use App\Http\Controllers\rider\RiderDashboardController;
use App\Http\Controllers\rider\RiderProfileController;
use App\Http\Controllers\TrackingController;

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

Route::get('/', function () {
    return view('welcome');
});


// Home Controller Controller --- Control Routes
Route::controller(HomeController::class)->group(function() {
    Route::get('/home', 'index')->name('home');
});

// Client Controller --- Control Routes
Route::controller(ClientController::class)->group(function() {
    // Route::get("/users", "viewLoad");
    Route::get("/client-signup", "clientSignup")->middleware('AlreadyLogin');
    Route::post("store", "store")->name("store");
    Route::get("/client-login", "clientLogin")->middleware('AlreadyLogin')->name('client-login');
    Route::post("/login_Auth", "login_Auth")->name("login_Auth");
    Route::get("/verify_email/{vkey}", "verify_email")->name("verify_email");
});

// Route::get('/verify_email/{vkey}', [ClientController::class, 'verify_email'])->name('verify_email');

// Client Profile Controller
Route::controller(ClientProfileController::class)->middleware('AuthCheck')->group(function() {
    Route::get('/client-dashboard/profile', 'index');
    Route::post('/client-dashboard/profile', 'updateProfile');
    Route::get('/user_data', 'get_client_user_data')->name('user_data');
    Route::get('/user_delete', 'client_delete_account')->name('user_delete');
    Route::get('/c_logout', 'c_logout');
});

// FClient Dashboard Controller --- Control Routes
Route::controller(ClientDashboardController::class)->middleware('AuthCheck')->group(function() {
    Route::get('/client-dashboard', 'index');
    Route::get('/client-dashboard/deliveries', 'index');
    Route::get('/client-dashboard/notification', 'notifications');
    Route::get('/client-dashboard/notification/{id}', 'notificationDetail')->where('id', '[0-9]+');
    Route::get('/client-dashboard/cancelled', 'cancelledRequests');
    Route::get('/client-dashboard/cancelled/{id}', 'cancelledRequestsDetail')->where('id', '[0-9]+');
    Route::get('/client-dashboard/password-and-security', 'clientPasswordAndSecurity');
    Route::get('/client-dashboard/tracking', 'tracking');
    Route::get('/client-dashboard/success', 'successDeliveries');
});

// Rider Controller --- Control Routes
Route::controller(RiderController::class)->group(function() {
    // Route::get("/users", "viewLoad");
    Route::get("/rider-signup", "riderSignup")->middleware('R_AlreadyLogin');
    Route::post("/rider_store", "store")->name("rider_store");
    Route::get("/rider-login", "riderLogin")->middleware('R_AlreadyLogin');
    Route::post("/rider-login_Auth", "rider_login_Auth")->name("rider-login_Auth");
});

// Rider Profile Controller
Route::controller(RiderProfileController::class)->middleware('R_AuthCheck')->group(function() {
    Route::get('/rider-dashboard/profile', 'index');
    Route::post('/rider-dashboard/profile', 'updateRiderProfile');
    Route::get('/rider_delete', 'rider_delete_account')->name('rider_delete');
    Route::get('/rider-dashboard/profile-and-password', 'passwordAndSecurity');
    Route::get('/r_logout', 'r_logout');
});

// Rider Dashboard Controller
Route::controller(RiderDashboardController::class)->middleware('R_AuthCheck')->group(function() {
    Route::get('/rider-dashboard', 'index');
    Route::get('/rider-accepted', 'accepted');
    Route::get('/rider-request/{id}', 'requestDetails')->where('id', '[0-9]+');
});

// Forgot Password Controller --- Control Routes
Route::controller(ForgotPassController::class)->group(function () {
    Route::get('/forgot-password', 'index')->name('forgot-password');
    Route::post('/client_SC', 'client_send_code')->name('client_SC');
    Route::post('/rider_SC', 'rider_send_code')->name('rider_SC');
    Route::post('/client_RC', 'client_reset_code')->name('client_RC');
    Route::post('/rider_RC', 'rider_reset_code')->name('rider_RC');
});

// Tracking Controller --- Control Routes
Route::controller(TrackingController::class)->group(function() {
    Route::get('/tracking', 'index')->name('tracking');
});

// Admin Controller --- Control Routes
Route::controller(AdminController::class)->group(function() {
    Route::get('/admin/login', 'index')->middleware('A_AlreadyLogin');
    Route::get('/admin', 'dashboardAdmin')->middleware('A_AuthCheck');
    Route::get('/applications', 'application')->name('applications')->middleware('A_AuthCheck');
    Route::post('/applications/verify', 'updateVerified')->middleware('A_AuthCheck');
    Route::post('/login', 'login');
    Route::get('/admin-logout', 'admin_logout');
});