<?php

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

Route::get('/', function () {
    return view('pelapor.index');
});

// Route::get('/main_pelapor', function () {
//     return view('layouts.main_pelapor');
// });

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

Route::get('/login_admin', function () {
    return view('admin.login_admin');
});



