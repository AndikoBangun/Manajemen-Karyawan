<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AbsensiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminAbsensiController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminLaporanController;
use App\Http\Controllers\LaporanController;


Route::get('/', function () {
    if (Auth::check()) {
        // Jika user sudah login, arahkan sesuai role-nya
        if (Auth::user()->role === 'admin') {
            return redirect()->route('dashboard.admin');
        } else {
            return redirect()->route('karyawan.dashboard');
        }
    }

    // Jika belum login, arahkan ke halaman login
    return redirect()->route('login');
});

// Auth routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard berdasarkan role
Route::get('/admin/dashboard', function () {
    return view('dashboard.admin');
})->name('admin.dashboard')->middleware('auth');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->name('dashboard.admin');


Route::get('/karyawan/dashboard', function () {
    return view('dashboard.karyawan');
})->name('karyawan.dashboard')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [EmployeeController::class, 'showProfile'])->name('profile.show');
    Route::get('/profile/edit', [EmployeeController::class, 'editProfile'])->name('profile.edit');
    Route::post('/profile/update', [EmployeeController::class, 'updateProfile'])->name('profile.update');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('employees', EmployeeController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/absensi/index', [AbsensiController::class, 'index'])->name('absensi.index');
    Route::post('/absen-masuk', [AbsensiController::class, 'absenMasuk'])->name('absen.masuk');
    Route::post('/absen-pulang', [AbsensiController::class, 'absenPulang'])->name('absen.pulang');
});

Route::get('/absensi/admin{id}/riwayat', 
    [AdminAbsensiController::class, 'riwayat'])
    ->name('absensi.admin.riwayat');


Route::middleware(['auth'])->group(function () {
    Route::get('/absensi/admin', [AdminAbsensiController::class, 'admin'])->name('absensi.admin');
    Route::get('/absensi/{id}', [AdminAbsensiController::class, 'riwayat'])->name('absensi.admin.riwayat');
});

// Karyawan upload laporan
Route::middleware(['auth'])->group(function () {
    Route::get('/karyawan/laporan', [LaporanController::class, 'form'])->name('employees.laporan.form');
    Route::post('/karyawan/laporan', [LaporanController::class, 'upload'])->name('employees.laporan.upload');
});




Route::resource('employees', EmployeeController::class)->middleware('auth');

