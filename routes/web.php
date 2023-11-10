<?php

use App\Http\Controllers\Extension\Kiosk\KioskClinicController;
use App\Http\Controllers\Extension\Kiosk\KioskIndexController;
use App\Http\Controllers\Sabat\Home\HomeIndexController;
use App\Http\Controllers\Secure\SecureAccessController;
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

Route::group(['middleware' => ['check.session']], function () {
    Route::controller(SecureAccessController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login/post', 'login_post')->name('login.post');
        Route::get('/authout', 'authout')->name('authout');
    });
});

Route::group(['middleware' => ['check.session']], function () {
    Route::controller(HomeIndexController::class)->group(function () {
        Route::get('/', 'index')->name('home');
    });
});

// ==== EXTENSION ====
// ========= START KIOSK =========
Route::controller(KioskIndexController::class)->group(function () {
    Route::get('/kiosk', 'index')->name('kiosk');
    Route::get('/kiosk/get-ticket-counter/{prefix}', 'get_tikcet_counter')->name('kiosk.getticketcounter');
    Route::get('/kiosk/ticket-counter/{id}', 'ticket_counter')->name('kiosk.ticketcounter');
});

Route::controller(KioskClinicController::class)->group(function () {
    Route::get('/kiosk/clinic', 'index')->name('kiosk.clinic');
});
// ========== END KIOSK ==========
