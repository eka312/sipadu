<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Laporan;
use App\Models\Pelapor;
use App\Models\User;
use Illuminate\Http\Request;

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
        $pelapor = Pelapor::all();
        return view('admin.laporan', compact('pelapor', 'laporan', 'kasus', 'petugas'));
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
        $laporanTerbaru = Laporan::orderBy('created_at', 'desc')->take(5)->get();
        $laporanDiproses = Laporan::where('status', 'diproses')->orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('jumlahLaporan', 'menunggu', 'diproses', 'selesai','laporanTerbaru', 'laporanDiproses'));
    }

}
