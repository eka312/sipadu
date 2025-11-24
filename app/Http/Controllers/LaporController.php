<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Kasus;
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
            'file_bukti' => 'nullable|file|mimes:jpg,jpeg,png,pdf',
        ]);

        $laporan = new Laporan();

        // sementara pakai dummy id_pelapor (ganti nanti pakai auth)
        $laporan->id_pelapor = 1;
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
}
