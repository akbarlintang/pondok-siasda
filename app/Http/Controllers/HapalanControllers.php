<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hapalan;
use App\Models\Siswa;

class HapalanControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Siswa $siswas, Request $request)
    {
        if (is_null($request->tingkatan)) {
            $tingkat = '1';
        } else {
            $tingkat = $request->tingkatan;
        }
        if (is_null($request->kelas)) {
            $kelas = 'A';
        } else {
            $kelas = $request->kelas;
        }
        if (is_null($request->jenjang)) {
            $jenjang = 'smk';
        } else {
            $jenjang = $request->jenjang;
        }
        $siswas = Siswa::with('hapalans')
        ->where('tingkatan',$tingkat)
        ->where('kelas',$kelas)
        ->where('jenjang',$jenjang)
        ->get();
        return view ('hapalans.index',compact('siswas','tingkat','kelas','jenjang'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $siswas = Siswa::where('id',$request->id)->first();
        return view ('hapalans.create',compact('siswas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_data = array(
            'foreign'       =>   $request->id,
            'hapalan'       =>   $request->hapalan,
            'tanggal'       =>   $request->tanggal,
        );

        Hapalan::create($form_data);

        return redirect()->route('hapalans.index')
        ->with(['success' => 'Berhasil Menambah Hapalan']);   
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::where('id',$id)->first();
        $hapalans = Hapalan::where('foreign',$id)->get();
        // dd($hapalans);
        return view ('hapalans.show',compact('hapalans','siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
