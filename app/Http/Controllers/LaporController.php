<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;
use App\Models\Kasus;
use Illuminate\Http\Request;

class LaporController extends Controller
{
    // Tampilkan form laporan
    public function create()
    {
        $kasus = Kasus::all(); // ambil daftar jenis kasus

        // Tentukan nama pelapor dan role sesuai guard yang login
        if (auth('siswa')->check()) {
            $nama = auth('siswa')->user()->nama_siswa;
            $role = 'siswa';
        } elseif (auth('guru')->check()) {
            $nama = auth('guru')->user()->nama_guru;
            $role = 'guru';
        } else {
            abort(403);
        }

        return view('pelapor.lapor', compact('kasus', 'nama', 'role'));
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                'id_kasus' => 'required',
                'deskripsi' => 'required',
                'lokasi' => 'required',
                'waktu_kejadian' => 'required',
                'file_bukti' => 'required|mimes:jpg,jpeg,png,pdf,mp4,mov,avi,mkv,wmv,flv,webm|max:20480',

            ],
            [
                'id_kasus.required' => 'Jenis aduan wajib dipilih.',
                'deskripsi.required' => 'Deskripsi kejadian wajib diisi.',
                'lokasi.required' => 'Lokasi kejadian wajib diisi.',
                'waktu_kejadian.required' => 'Waktu kejadian wajib diisi.',

                'file_bukti.required' => 'Bukti pendukung wajib diunggah.',
                'file_bukti.mimes' => 'Format file tidak didukung.',
                'file_bukti.max' => 'Ukuran file maksimal 20MB.',
            ]
        );

        // Simpan laporan
        $laporan = new Laporan();
        $laporan->id_kasus = $request->id_kasus;
        $laporan->deskripsi = $request->deskripsi;
        $laporan->lokasi = $request->lokasi;
        $laporan->tanggal_waktu = $request->waktu_kejadian;

        // Tentukan pelapor berdasarkan guard yang login
        if (Auth::guard('siswa')->check()) {
            $laporan->id_siswa = Auth::guard('siswa')->user()->id_siswa;
            $route = 'status.siswa';
        } elseif (Auth::guard('guru')->check()) {
            $laporan->id_guru = Auth::guard('guru')->user()->id_guru;
            $route = 'status.guru';
        } else {
            abort(403);
        }

        if ($request->hasFile('file_bukti')) {
            $laporan->file_bukti = $request->file('file_bukti')->store('bukti', 'public');
        }

        $laporan->save();




        return redirect()->route($route);
    }

    public function update(Request $request, string $id)
    {
        // Ambil laporan
        $laporan = Laporan::where('id_laporan', $id)->firstOrFail();

        // Pastikan laporan milik user yang login
        if (auth('siswa')->check()) {
            if ($laporan->id_siswa !== auth('siswa')->user()->id_siswa) {
                abort(403);
            }
        } elseif (auth('guru')->check()) {
            if ($laporan->id_guru !== auth('guru')->user()->id_guru) {
                abort(403);
            }
        } else {
            abort(403);
        }

        // Hanya boleh edit jika status MENUNGGU
        if ($laporan->status !== 'menunggu') {
            return back()->with('error', 'Laporan tidak dapat diedit karena sedang diproses.');
        }

        //  Validasi
        $request->validate(
            [
                'lokasi' => 'required|string',
                'deskripsi' => 'required|string',
                'file_bukti' => 'required|mimes:jpg,jpeg,png,pdf,mp4,mov,avi,mkv,wmv,flv,webm|max:20480',

            ],
            [
                'id_kasus.required' => 'Jenis aduan wajib dipilih.',
                'deskripsi.required' => 'Deskripsi kejadian wajib diisi.',
                'file_bukti.required' => 'Bukti pendukung wajib diunggah.',
                'file_bukti.mimes' => 'Format file tidak didukung.',
                'file_bukti.max' => 'Ukuran file maksimal 20MB.',
                'lokasi.required' => 'Lokasi kejadian wajib diisi.',
                'waktu_kejadian.required' => 'Waktu kejadian wajib diisi.',

                
            ]
        );

        // Update data
        $laporan->lokasi = $request->lokasi;
        $laporan->deskripsi = $request->deskripsi;

        // Jika upload file baru
        if ($request->hasFile('file_bukti')) {
            $laporan->file_bukti = $request->file('file_bukti')->store('bukti', 'public');
        }

        $laporan->save();

        return redirect()->back()->with('success', 'Laporan berhasil diperbarui.');
    }


    public function status()
    {
        if (auth('siswa')->check()) {
            $laporan = Laporan::where('id_siswa', auth('siswa')->user()->id_siswa)
                ->orderBy('tanggal_waktu', 'desc')
                ->get();
            $nama = auth('siswa')->user()->nama_siswa;
        } elseif (auth('guru')->check()) {
            $laporan = Laporan::where('id_guru', auth('guru')->user()->id_guru)
                ->orderBy('tanggal_waktu', 'desc')
                ->get();
            $nama = auth('guru')->user()->nama_guru;
        } else {
            abort(403);
        }



        return view('pelapor.status_kasus', compact('laporan', 'nama'));
    }
}
