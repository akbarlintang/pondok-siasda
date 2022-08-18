<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapels = MataPelajaran::get();
        return view ('mapels.index',compact('mapels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('mapels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MataPelajaran::create([
            'nama' => $request->nama_mapel
        ]);

        return redirect()->route('mapels.index')
        ->with(['success' => 'Berhasil Menambah Data Mata Pelajaran']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MataPelajaran  $mataPelajaran
     * @return \Illuminate\Http\Response
     */
    public function show(MataPelajaran $mataPelajaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MataPelajaran  $mataPelajaran
     * @return \Illuminate\Http\Response
     */
    public function edit(MataPelajaran $mataPelajaran, $id)
    {
        $mapel = MataPelajaran::whereId($id)->first();
        return view ('mapels.edit', compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MataPelajaran  $mataPelajaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MataPelajaran $mataPelajaran, $id)
    {
        MataPelajaran::whereId($id)->update([
            'nama' => $request->nama_mapel
        ]);

        return redirect()->route('mapels.index')
        ->with(['success' => 'Berhasil Menyunting Data Mata Pelajaran']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MataPelajaran  $mataPelajaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(MataPelajaran $mataPelajaran)
    {
        //
    }
}
