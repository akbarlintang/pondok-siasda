<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaControllers extends Controller
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
        $siswas = Siswa::where('tingkatan',$tingkat)
        ->where('kelas',$kelas)
        ->where('jenjang',$jenjang)
        ->paginate(5);
        
        return view ('siswas.index',compact('siswas','tingkat','kelas','jenjang'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswas.create');
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
            'nama_siswa'       =>   $request->nama_siswa,
            'nis'       =>   $request->nis,
            'jenjang'       =>   $request->jenjang,
            'tingkatan'       =>   $request->tingkatan,
            'kelas'       =>   $request->kelas,
            'tempat_lahir'       =>   $request->tempat_lahir,
            'tanggal_lahir'       =>   $request->tanggal_lahir,
            'tahun_masuk' => $request->tahun_masuk,
            'wali_kamar'       =>   $request->wali_kamar,
            'nomor_wali'       =>   $request->nomor_wali,
        );

        Siswa::create($form_data);

        // $id = Siswa::where('');

        $form = array(

        );

        return redirect()->route('siswas.index')
        ->with(['success' => 'Berhasil Menambah Siswa']);   
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
    public function edit(Siswa $siswa)
    {
        return view('siswas.edit',compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        Siswa::where('id',$siswa->id)->update([
            'nama_siswa'       =>   $request->nama_siswa,
            'nis'       =>   $request->nis,
            'jenjang'       =>   $request->jenjang,
            'tingkatan'       =>   $request->tingkatan,
            'kelas'       =>   $request->kelas,
            'tempat_lahir'       =>   $request->tempat_lahir,
            'tanggal_lahir'       =>   $request->tanggal_lahir,
            'tahun_masuk' => $request->tahun_masuk,
            'wali_kamar'       =>   $request->wali_kamar,
            'nomor_wali'       =>   $request->nomor_wali,
        ]);

        return redirect()->route('siswas.index')
        ->with(['success'=>'Siswa Berhasil Disunting !']);
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
