<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\Auth\LoginControllerRent;
use App\Http\Controllers\Auth\LoginControllerAdmin;
use App\Http\Controllers\Penyewa\dashboardPeController as dashboardPenyewa;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Owner\DashboardController as OwnerDashboard;

// Public Area
Route::get('/', [LandingPageController::class, 'index'])->name('home');
Route::get('/kamar/{id}', [dashboardPenyewa::class, 'show'])->name('kamar.show');


// Guest Area iki (Belum Login)
Route::middleware('guest')->group(function () {
    // Jalur Penyewa & Owner
    Route::get('/login', [LoginControllerRent::class, 'index'])->name('login');
    Route::post('/login', [LoginControllerRent::class, 'authenticate']);
    Route::get('/register', [LoginControllerRent::class, 'registerIndex'])->name('register');
    Route::post('/register', [LoginControllerRent::class, 'store']);

    // Jalur Khusus Master Admin
    Route::prefix('admin-griya')->group(function () {
        Route::get('/login', [LoginControllerAdmin::class, 'loginPage'])->name('admin.login');
        Route::post('/login', [LoginControllerAdmin::class, 'loginProcess'])->name('admin.login.process');
    });
});


// Auth Area (Wajib login)
Route::middleware('auth')->group(function () {

    // A. Bagian Admin (Tugas ...)
    Route::middleware('can:access-admin')->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('admin.dashboard');
        Route::post('/logout', [LoginControllerRent::class, 'logout'])->name('admin.logout');
    });

    // B. Bagian Owner (Tugas ...)
    Route::middleware('can:access-owner')->prefix('owner')->group(function () {
        Route::get('/dashboard', [OwnerDashboard::class, 'index'])->name('owner.dashboard');
        Route::post('/logout', [LoginControllerRent::class, 'logout'])->name('owner.logout');
    });

    // Bagian Penyewa (Tugas Hammam)
    Route::middleware('can:access-penyewa')->group(function () {
        Route::get('/dashboard', [dashboardPenyewa::class, 'index'])->name('penyewa.dashboard');
        Route::get('/profile', [dashboardPenyewa::class, 'profile'])->name('profile'); // Masuk ke controller penyewa
        Route::post('/logout', [LoginControllerRent::class, 'logout'])->name('logout');
    });
});

?>
