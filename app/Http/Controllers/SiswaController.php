<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::All();

        return view('siswa.data_siswa', compact('siswa'));
    }


    public function store(Request $request)
    {
        $siswa = Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'alamat_siswa' => $request->alamat_siswa,
        ]);
        return redirect('/data_siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // untuk mengambil data siswa berdasarkan kolom id_siswa
        $siswa = Siswa::where('id_siswa', $id)->first();
        return view('siswa.ubah_siswa', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Siswa::where('id_siswa', $id)
            ->update([
                'nama_siswa' => $request->nama_siswa,
                'alamat_siswa' => $request->alamat_siswa,
            ]);
        return redirect('/data_siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Siswa::where('id_siswa', $id)->delete();

        //setelah terhapus akan dialihkan ke hal data siswa
        return redirect('/data_siswa');
    }

}
