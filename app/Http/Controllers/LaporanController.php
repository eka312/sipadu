<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Laporan;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = Laporan::all();
        $kasus = Kasus::all();
        $petugas = User::all();
        $guru = Guru::all();
        $siswa = Siswa::all();
        return view('admin.laporan', compact('guru','siswa', 'laporan', 'kasus', 'petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


        Laporan::where('id_laporan', $id)
            ->update([
                'id_user' => $request->id_user,
                'status' => $request->status,
            ]);

        return redirect('/laporan');
    }

    public function dashboard()
    {
        $jumlahLaporan = Laporan::count();
        $menunggu = Laporan::where('status', 'menunggu')->count();
        $diproses = Laporan::where('status', 'diproses')->count();
        $selesai = Laporan::where('status', 'selesai')->count();
        $laporanTerbaru = Laporan::whereDate('tanggal_waktu', Carbon::today())
            ->orderBy('tanggal_waktu', 'desc')
            ->get();

        $laporanDiproses = Laporan::where('status', 'diproses')
            ->whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'desc')
            ->get();




        return view('admin.dashboard', compact('jumlahLaporan', 'menunggu', 'diproses', 'selesai', 'laporanTerbaru', 'laporanDiproses'));
    }
}
