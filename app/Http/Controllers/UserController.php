<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::orderBy('created_at', 'asc')->get();
        return view('admin.petugas', compact('petugas'));
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
        $petugas = User::create([   
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'nama_petugas' => $request->nama_petugas,
            'jabatan' => $request->jabatan,
        ]);
        return redirect('/petugas');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'email' => $request->email,
            'nama_petugas' => $request->nama_petugas,
            'jabatan' => $request->jabatan,
        ];
    
        // Hanya update password kalau user mengisi
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
    
        User::where('id_user', $id)->update($data);
    
        return redirect('/petugas');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = User::where('id_user', $id)->delete();
        
        //setelah terhapus akan dialihkan ke hal data petugas
        return redirect('/petugas');
    }
}
