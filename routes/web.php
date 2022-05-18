<?php

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
    Route::get("/client-signup", "clientSignup");
    Route::post("/store", "store")->name("store");
    Route::get("/client-login", "clientLogin");
    Route::post("/login_Auth", "login_Auth")->name("login_Auth");
});

// Client Profile Controller
Route::controller(ClientProfileController::class)->group(function() {
    Route::get('/client-profile', 'index');
});

// FClient Dashboard Controller --- Control Routes
Route::controller(ClientDashboardController::class)->group(function() {
    Route::get('/client-dashboard', 'index')->middleware('checkLogin');

    Route::get('/client-dashboard', 'index');
    Route::get('/client-dashboard/notification', 'notifications');
    Route::get('/client-dashboard/notification/{id}', 'notificationDetail')->where('id', '[0-9]+');
    Route::get('/client-dashboard/cancelled', 'cancelledRequests');
    Route::get('/client-dashboard/cancelled/{id}', 'cancelledRequestsDetail')->where('id', '[0-9]+');
});

// Rider Controller --- Control Routes
Route::controller(RiderController::class)->group(function() {
    // Route::get("/users", "viewLoad");
    Route::get("/rider-signup", "riderSignup");
    Route::post("/rider_store", "store")->name("store");
    Route::get("/rider-login", "riderLogin");
    Route::post("/rider-login_Auth", "rider_login_Auth")->name("rider-login_Auth");
});

// Rider Profile Controller
Route::controller(RiderProfileController::class)->group(function() {
    Route::get('/rider-profile', 'index');
    Route::get('/rider-delete-account', 'deleteAccount');
    Route::get('/rider-profile-and-password', 'passwordAndSecurity');
});

// Rider Dashboard Controller
Route::controller(RiderDashboardController::class)->group(function() {
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
