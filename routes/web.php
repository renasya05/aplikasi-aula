<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendaftaranController;
use Illuminate\Support\Facades\Route;


// =========================
// HALAMAN AWAL
// =========================

Route::get('/', function () {
    return redirect()->route('login');
});


// =========================
// AUTH
// =========================

Route::get(
    '/login',
    [AuthController::class, 'showLogin']
)->name('login');

Route::post(
    '/login',
    [AuthController::class, 'login']
)->name('login.process');

Route::get(
    '/register',
    [AuthController::class, 'showRegister']
)->name('register');

Route::post(
    '/register',
    [AuthController::class, 'register']
)->name('register.process');

Route::post(
    '/logout',
    [AuthController::class, 'logout']
)->name('logout');


// =========================
// USER
// =========================

Route::middleware('auth')->group(function () {

    // Dashboard User
    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');


    // Daftar Aula
    Route::get(
        '/aulas',
        [DashboardController::class, 'aulas']
    )->name('aulas');


    // Form Pendaftaran
    Route::get(
        '/pendaftaran/{aula}',
        [PendaftaranController::class, 'create']
    )->name('pendaftaran.create');


    // Simpan Pendaftaran
    Route::post(
        '/pendaftaran',
        [PendaftaranController::class, 'store']
    )->name('pendaftaran.store');


    // Riwayat User
    Route::get(
        '/riwayat-pendaftaran',
        [PendaftaranController::class, 'history']
    )->name('pendaftaran.history');

});


// =========================
// ADMIN
// =========================

Route::middleware(['auth', 'admin'])->group(function () {


    // =========================
    // DASHBOARD ADMIN
    // =========================

    Route::get(
        '/admin/dashboard',
        [AdminController::class, 'dashboard']
    )->name('admin.dashboard');


    // =========================
    // DATA AULA
    // =========================

    // Daftar Aula
    Route::get(
        '/admin/aulas',
        [AdminController::class, 'aulas']
    )->name('admin.aulas');


    // Form Tambah Aula
    Route::get(
        '/admin/aulas/create',
        [AdminController::class, 'createAula']
    )->name('admin.aulas.create');


    // Simpan Aula Baru
    Route::post(
        '/admin/aulas',
        [AdminController::class, 'storeAula']
    )->name('admin.aulas.store');


    // Detail Aula
    Route::get(
        '/admin/aulas/{aula}',
        [AdminController::class, 'showAula']
    )->name('admin.aulas.show');


    // Form Edit Aula
    Route::get(
        '/admin/aulas/{aula}/edit',
        [AdminController::class, 'editAula']
    )->name('admin.aulas.edit');


    // Update Aula
    Route::put(
        '/admin/aulas/{aula}',
        [AdminController::class, 'updateAula']
    )->name('admin.aulas.update');


    // Hapus Aula
    Route::delete(
        '/admin/aulas/{aula}',
        [AdminController::class, 'destroyAula']
    )->name('admin.aulas.destroy');


    // =========================
    // RIWAYAT PENDAFTARAN
    // =========================

    Route::get(
        '/admin/history',
        [AdminController::class, 'history']
    )->name('admin.history');


    // =========================
    // DETAIL PENDAFTARAN
    // =========================

    Route::get(
        '/admin/pendaftaran/{pendaftaran}',
        [AdminController::class, 'show']
    )->name('admin.pendaftaran.show');


    // =========================
    // SETUJUI PENDAFTARAN
    // =========================

    Route::put(
        '/admin/pendaftaran/{pendaftaran}/approve',
        [AdminController::class, 'approve']
    )->name('admin.pendaftaran.approve');


    // =========================
    // TOLAK PENDAFTARAN
    // =========================

    Route::put(
        '/admin/pendaftaran/{pendaftaran}/reject',
        [AdminController::class, 'reject']
    )->name('admin.pendaftaran.reject');

});