<?php

namespace App\Http\Controllers;

use App\Imports\GuruImport;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::orderBy('created_at', 'asc')->get();
        $mapel = Mapel::all();
        return view('admin.guru', compact('guru', 'mapel'));

    }

    public function import_excel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
    
        Excel::import(new GuruImport, $request->file('file'));
    
        return redirect('/guru');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_mapel' => 'required',
            'nama_guru' => 'required',
            'email' => 'required|email|unique:guru',
            'password' => 'required|min:8',
            'no_identitas' => 'required'
        ]);

        Guru::create([
            'id_mapel' => $request->id_mapel,
            'nama_guru' => $request->nama_guru,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_identitas' => $request->no_identitas,
        ]);

        return redirect()->back()->with('success', 'Guru berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_mapel' => 'required',
            'nama_guru' => 'required',
            'email' => "required|email|unique:guru,email,$id,id_guru",
            'no_identitas' => 'required'
        ]);

        $data = [
            'id_mapel' => $request->id_mapel,
            'nama_guru' => $request->nama_guru,
            'email' => $request->email,
            'no_identitas' => $request->no_identitas,
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        Guru::where('id_guru', $id)->update($data);

        return redirect()->back()->with('success', 'Data guru berhasil diupdate!');
    }

    public function destroy($id)
    {
        Guru::where('id_guru', $id)->delete();
        return redirect()->back()->with('success', 'Data guru berhasil dihapus!');
    }
}
