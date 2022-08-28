<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spp;
use App\Models\Siswa;

class SPPControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Siswa $siswas, Request $request)
    {
        // Cek tingkatan
        if ($request->tingkatan) {
            $request->session()->put('tingkat', $request->tingkatan);
            $tingkat = $request->session()->get('tingkat');
        } elseif ($request->session()->has('tingkat')) {
            $tingkat = $request->session()->get('tingkat');
        } else {
            $tingkat = '1';
        }

        // Cek kelas
        if ($request->kelas) {
            $request->session()->put('kelas', $request->kelas);
            $kelas = $request->session()->get('kelas');
        } elseif ($request->session()->has('kelas')) {
            $kelas = $request->session()->get('kelas');
        } else {
            $kelas = 'A';
        }

        // Cek jenjang
        if ($request->jenjang) {
            $request->session()->put('jenjang', $request->jenjang);
            $jenjang = $request->session()->get('jenjang');
        } elseif($request->session()->has('jenjang')) {
            $jenjang = $request->session()->get('jenjang');
        } else {
            $jenjang = 'smk';
        }
        
        $siswas = Siswa::with('spps')
        ->where('tingkatan',$tingkat)
        ->where('kelas',$kelas)
        ->where('jenjang',$jenjang)
        ->get();
        // dd($siswas);
        return view ('spps.index',compact('siswas','tingkat','kelas','jenjang'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $siswas = Siswa::where('id',$request->id)->first();
        return view ('spps.create',compact('siswas'));
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
            'status'       =>   $request->status,
            'sisa'       =>   $request->sisa,
            'tanggal'       =>   $request->tanggal,
        );

        Spp::create($form_data);

        return redirect()->route('spps.index')
        ->with(['success' => 'Berhasil Menambah SPP']);   
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
        $spps = Spp::where('foreign',$id)->orderBy('tanggal', 'DESC')->get();
        // dd($spps);
        return view ('spps.show',compact('spps','siswa'));
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
