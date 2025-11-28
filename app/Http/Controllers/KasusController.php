<?php

namespace App\Http\Controllers;

use App\Models\Kasus;

use Illuminate\Http\Request;

class KasusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $kasus = Kasus::all();
        return view('admin.kasus', compact('kasus'));
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
        $kasus = Kasus::create([   
            'jenis_kasus' => $request->jenis_kasus,
        ]);
        return redirect('/kasus');
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
        Kasus::where('id_kasus', $id)
        ->update([
            'jenis_kasus' => $request->jenis_kasus,
        ]);
        return redirect('/kasus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Kasus::where('id_kasus', $id)->delete();
        
        //setelah terhapus akan dialihkan ke hal data kasus
        return redirect('/kasus');
    }
}
