<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;
use App\Models\Kasus;
use App\Models\Pelapor;
use Illuminate\Http\Request;

class LaporController extends Controller
{
    // Tampilkan form laporan
    public function create()
    {
        $kasus = Kasus::all(); // ambil daftar jenis kasus
        return view('pelapor.lapor', compact('kasus'));
    }

    // Simpan laporan ke database
    public function store(Request $request)
    {
        $request->validate([
            'id_kasus' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'waktu_kejadian' => 'required',
            'file_bukti' => 'nullable|mimes:jpg,jpeg,png,pdf,mp4,mov,avi,mkv,wmv,flv,webm|max:20480',
        ]);

        // Tentukan pelapor sesuai guard yang login dan pastikan ada di tabel pelapor
        if (Auth::guard('siswa')->check()) {
            $idPelaporUser = Auth::guard('siswa')->user()->id_siswa;
            $role = 'siswa';

            // Insert/update pelapor di tabel pelapor
            $pelapor = Pelapor::firstOrCreate(
                ['id_siswa' => $idPelaporUser]
            );
        } elseif (Auth::guard('guru')->check()) {
            $idPelaporUser = Auth::guard('guru')->user()->id_guru;
            $role = 'guru';

            // Insert/update pelapor di tabel pelapor
            $pelapor = Pelapor::firstOrCreate(
                ['id_guru' => $idPelaporUser]
            );
        } else {
            return redirect('/login')->with('error', 'Anda tidak memiliki akses.');
        }

        // Simpan laporan
        $laporan = new Laporan();
        $laporan->id_pelapor = $pelapor->id_pelapor;
        $laporan->id_kasus = $request->id_kasus;
        $laporan->deskripsi = $request->deskripsi;
        $laporan->lokasi = $request->lokasi;
        $laporan->tanggal_waktu = $request->waktu_kejadian;

        if ($request->hasFile('file_bukti')) {
            $laporan->file_bukti = $request->file('file_bukti')->store('bukti', 'public');
        }

        $laporan->save();

        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }

    public function statusSiswa()
    {
        $pelapor = Pelapor::where('id_siswa', auth()->guard('siswa')->user()->id_siswa)->first();
        $laporan = Laporan::where('id_pelapor', $pelapor->id_pelapor)->get();
    
        return view('pelapor.status_kasus', compact('laporan'));
    }
    
    public function statusGuru()
    {
        $pelapor = Pelapor::where('id_guru', auth()->guard('guru')->user()->id_guru)->first();
        $laporan = Laporan::where('id_pelapor', $pelapor->id_pelapor)->get();
    
        return view('pelapor.status_kasus', compact('laporan'));
    }
}
