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

// Route::get('/main_pelapor', function () {
//     return view('layouts.main_pelapor');
// });
// Route::get('/main_admin', function () {
//     return view('layouts.main_admin');
// });


// milik pelapor

Route::get('/', function () {
    return view('pelapor.index');
});

Route::get('/lapor', function () {
    return view('pelapor.lapor');
});

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

// Route::controller(MapelController::class)->group(function () {
//     Route::get('/guru', 'index');
//     Route::post('/guru', 'store'); // tambah
//     Route::post('/guru/{id}', 'update'); // edit
//     Route::delete('/guru/{id}', 'destroy'); // hapus
// });

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

Route::get('/kasus', [KasusController::class, 'index']);

Route::get('/laporan', [LaporanController::class, 'index']);







