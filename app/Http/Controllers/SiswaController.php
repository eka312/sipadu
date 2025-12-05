<?php

namespace App\Http\Controllers;


use App\Imports\SiswaImport;
use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
        $kelas = Kelas::all();

        return view('admin.siswa', compact('siswa', 'kelas'));
    }

    public function import_excel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
    
        Excel::import(new SiswaImport, $request->file('file'));
    
        return redirect('/siswa');
    }
    


    public function store(Request $request)
    {
        $siswa = Siswa::create([
            'id_kelas' => $request->id_kelas,
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'tanggal_lahir' => $request->tanggal_lahir,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/siswa');
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
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Siswa::where('id_siswa', $id)
            ->update([
                'id_kelas' => $request->id_kelas,
                'nis' => $request->nis,
                'nama_siswa' => $request->nama_siswa,
                'tanggal_lahir' => $request->tanggal_lahir,
                'password' => Hash::make($request->password),
            ]);
        return redirect('/siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Siswa::where('id_siswa', $id)->delete();

        //setelah terhapus akan dialihkan ke hal data siswa
        return redirect('/siswa');
    }


}
