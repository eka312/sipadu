<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $kelas = Kelas::all();
        return view('admin.kelas', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kelas = Kelas::create([   
            'nama_kelas' => $request->nama_kelas,
        ]);
        return redirect('/kelas');
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Kelas::where('id_kelas', $id)
        ->update([
            'nama_kelas' => $request->nama_kelas,
        ]);
        return redirect('/kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Kelas::where('id_kelas', $id)->delete();
        
        //setelah terhapus akan dialihkan ke hal data kelas
        return redirect('/kelas');
    }
}
