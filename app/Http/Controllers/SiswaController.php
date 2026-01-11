<?php

namespace App\Http\Controllers;

use App\Imports\SiswaImport;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    /**
     * Tampilkan data siswa
     */
    public function index()
    {
        $siswa = Siswa::orderBy('kelas', 'asc')
            ->orderBy('nama_siswa', 'asc')
            ->get();

        return view('admin.siswa', compact('siswa'));
    }

    /**
     * Import Excel
     */
    public function import_excel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        Excel::import(new SiswaImport, $request->file('file'));

        return redirect('/siswa')->with('success', 'Data siswa berhasil diimport');
    }

    /**
     * Simpan data siswa
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis'           => 'required|unique:siswa,nis',
            'nama_siswa'    => 'required',
            'kelas'         => 'required',
            'tanggal_lahir' => 'required|date',
            'password'      => 'required|min:6',
        ]);

        Siswa::create([
            'nis'           => $request->nis,
            'nama_siswa'    => $request->nama_siswa,
            'kelas'         => $request->kelas, // 🔥 string
            'tanggal_lahir' => $request->tanggal_lahir,
            'password'      => Hash::make($request->password),
            'status'       => 'nonaktif',
        ]);

        return redirect('/siswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Update data siswa
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nis'           => 'required|unique:siswa,nis,' . $id . ',id_siswa',
            'nama_siswa'    => 'required',
            'kelas'         => 'required',
            'tanggal_lahir' => 'required|date',
        ]);

        Siswa::where('id_siswa', $id)->update([
            'nis'           => $request->nis,
            'nama_siswa'    => $request->nama_siswa,
            'kelas'         => $request->kelas,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect('/siswa')->with('success', 'Data siswa berhasil diperbarui');
    }

    /**
     * Hapus data siswa
     */
    // public function destroy($id)
    // {
    //     Siswa::where('id_siswa', $id)->update([
    //         'status' => 'nonaktif'
    //     ]);

    //     return redirect()->back()->with('success', 'siswa berhasil dinonaktifkan!');
    // }

    public function toggleStatus($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->status = $siswa->status === 'aktif'
            ? 'nonaktif'
            : 'aktif';

        $siswa->save();

        return redirect()->back();
    }
}
