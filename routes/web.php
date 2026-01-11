<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporController;
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



// milik pelapor


Route::get('/', function () {
    return view('pelapor.index');
});


Route::get('/login_guru', function () {
    return view('pelapor.login_guru');
});

Route::get('/login_siswa', function () {
    return view('pelapor.login_siswa');
});



Route::controller(AuthController::class)->group(function () {
    // Routing halaman login admin
    Route::get('/login_admin', 'index')->name('login.admin');

    // Routing proses login admin
    Route::post('/login_admin', 'login')->name('login.process');

    // Routing proses logout
    Route::get('/logout', 'logout')->name('logout');


    // routing halaman login siswa
    Route::post('/login_siswa', 'login_siswa')->name('login.siswa');

    Route::post('/logout_siswa', 'logout_siswa')->name('logout.siswa');


    // routing halaman login guru
    Route::post('/login_guru', 'login_guru')->name('login.guru');
    Route::post('/logout_guru', 'logout_guru')->name('logout.guru');
});



Route::middleware('auth:siswa')->prefix('siswa')->group(function () {
    Route::get('/lapor', [LaporController::class, 'create'])->name('lapor.siswa.create');
    Route::post('/lapor', [LaporController::class, 'store'])->name('lapor.siswa.store');
    Route::get('/status_kasus', [LaporController::class, 'status'])->name('status.siswa');;
});


Route::middleware('auth:guru')->prefix('guru')->group(function () {
    Route::get('/lapor', [LaporController::class, 'create'])->name('lapor.guru.create');
    Route::post('/lapor', [LaporController::class, 'store'])->name('lapor.guru.store');
    Route::get('/status_kasus', [LaporController::class, 'status'])->name('status.guru');
});

Route::middleware(['auth:siswa,guru'])->group(function () {
    Route::put('/lapor/{id}', [LaporController::class, 'update'])->name('lapor.update');
});








Route::middleware('auth:web')->group(function () {





    // siswa
    Route::controller(SiswaController::class)->group(function () {
        Route::get('/siswa', 'index');

        Route::post('/siswa', 'store')->name('siswa.store');

        Route::put('/siswa/{id}', 'update')->name('siswa.update');

        // Route::delete('/siswa/{id}', 'destroy')->name('siswa.delete');

        Route::post('/siswa/import_excel', 'import_excel')->name('siswa.import_excel');

        Route::patch('/siswa/{id}/toggle-status', 'toggleStatus')->name('siswa.toggle-status');
    });




    Route::controller(GuruController::class)->group(function () {
        Route::get('/guru', 'index');

        Route::post('/guru', 'store')->name('guru.store');

        Route::put('/guru/{id}', 'update')->name('guru.update');

        // Route::delete('/guru/{id}', 'destroy')->name('guru.delete');

        Route::post('/guru/import_excel', 'import_excel')->name('guru.import_excel');

        Route::patch('/guru/{id}/toggle-status', 'toggleStatus')->name('guru.toggle-status');
    });





    Route::controller(KasusController::class)->group(function () {

        Route::get('/kasus', 'index');

        Route::post('/kasus', 'store')->name('kasus.store');

        Route::put('/kasus/{id}', 'update')->name('kasus.update');

        Route::delete('/kasus/{id}', 'destroy')->name('kasus.delete');
    });





    Route::controller(LaporanController::class)->group(function () {

        // halaman data laporan + filter
        Route::get('/laporan', 'index')->name('laporan.index');

        // update status & petugas
        Route::put('/laporan/{id}', 'update')->name('laporan.update');

        // cetak laporan berdasarkan filter
        Route::get('/laporan/cetak', 'cetak')->name('laporan.cetak');

        // dashboard
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });





    Route::controller(UserController::class)->group(function () {
        // Routing halaman data petugas
        Route::get('/petugas', 'index');

        // Routing tambah petugas
        Route::post('/petugas', 'store')->name('petugas.store');

        // Routing ubah petugas
        Route::put('/petugas/{id}', 'update')->name('petugas.update');

        // Routing hapus petugas
        // Route::delete('/petugas/{id}', 'destroy')->name('petugas.delete');

        Route::patch('/petugas/{id}/toggle-status', 'toggleStatus')->name('petugas.toggle-status');
    });
});
