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
        $suplayer = suplayer::All();

        return view('suplayer.data_suplayer', compact('suplayer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suplayer.tambah_suplayer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $suplayer = suplayer::create([
            'nama_suplayer' => $request->nama_suplayer,
            'alamat_suplayer' => $request->alamat_suplayer,
        ]);
        return redirect('/data_suplayer');
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
        // untuk mengambil data suplayer berdasarkan kolom id_suplayer
        $suplayer = suplayer::where('id_suplayer', $id)->first();
        return view('suplayer.ubah_suplayer', compact('suplayer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        suplayer::where('id_suplayer', $id)
            ->update([
                'nama_suplayer' => $request->nama_suplayer,
                'alamat_suplayer' => $request->alamat_suplayer,
            ]);
        return redirect('/data_suplayer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = suplayer::where('id_suplayer', $id)->delete();

        //setelah terhapus akan dialihkan ke hal data suplayer
        return redirect('/data_suplayer');
    }

}
