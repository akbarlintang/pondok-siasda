<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use App\Models\EkstraSiswa;

class EkstraSiswaControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        $siswas = Siswa::with('ekstra_siswas')
        ->where('tingkatan',$tingkat)
        ->where('kelas',$kelas)
        ->where('jenjang',$jenjang)
        ->paginate(5);
        
        return view ('ekstrasiswas.index',compact('siswas','tingkat','kelas','jenjang'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('ekstrasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ekstrasiswa)
    {
        $siswas = Siswa::where('id',$ekstrasiswa)->first();
        $ekstrakurikuler = DB::table('ekstras')->get();
        return view('ekstrasiswas.edit',compact('siswas','ekstrakurikuler'));
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
