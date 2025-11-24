<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KasusController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\PelaporController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporController;
use App\Models\Laporan;
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

Route::get('/lapor', [LaporController::class, 'create'])->name('lapor.create');

// Simpan laporan
Route::post('/lapor', [LaporController::class, 'store'])->name('lapor.store');

Route::get('/status_kasus', function () {
    return view('pelapor.status_kasus');
});

Route::get('/login_guru', function () {
    return view('pelapor.login_guru');
});

Route::get('/login_siswa', function () {
    return view('pelapor.login_siswa');
});





// milik admin
Route::get('/login_admin', function () {
    return view('admin.login_admin');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

// Route::get('/guru', function () {
//     return view('admin.guru');
// });



Route::controller(GuruController::class)->group(function () {
    Route::get('/guru', 'index');
    Route::post('/guru', 'store'); // tambah
    Route::post('/guru/{id}', 'update'); // edit
    Route::delete('/guru/{id}', 'destroy'); // hapus
});


Route::get('/siswa', function () {
    return view('admin.siswa');
});

Route::get('/pelapor', [PelaporController::class, 'index']);

Route::get('/kelas', function () {
    return view('admin.kelas');
});

Route::get('/mapel', function () {
    return view('admin.mapel');
});


Route::controller(KasusController::class)->group(function () {

    Route::get('/kasus', 'index');

    Route::post('/kasus', 'store')->name('kasus.store');

    Route::put('/kasus/{id}', 'update')->name('kasus.update');

    Route::delete('/kasus/{id}', 'destroy')->name('kasus.delete');
});


// Route::controller(AuthController::class)->group(function () {
//     // Routing halaman login
//     Route::get('/login', 'index')->name('login');

//     // Routing proses login
//     Route::post('/login', 'login')->name('login.process');

//     // Routing proses logout
//     Route::get('/logout', 'logout')->name('logout');
// });



Route::controller(LaporanController::class)->group(function () {

    Route::get('/laporan', 'index');

    Route::put('/laporan/{id}', 'update')->name('laporan.update');
});


Route::controller(UserController::class)->group(function () {
    // Routing halaman data petugas
    Route::get('/petugas', 'index');

    // Routing tambah petugas
    Route::post('/petugas', 'store')->name('petugas.store');

    // Routing ubah petugas
    Route::post('/petugas/{id}', 'update')->name('petugas.update');

    // Routing hapus petugas
    Route::delete('/petugas/{id}', 'destroy')->name('petugas.delete');
});







