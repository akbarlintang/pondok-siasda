<?php

namespace App\Http\Controllers;

use App\Models\{Siswa, Penilaian};
use Illuminate\Http\Request;

class PenilaianControllers extends Controller
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
        
        return view ('penilaians.index',compact('siswas','tingkat','kelas','jenjang'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $id;
        $siswa = Siswa::where('id',$id)->first();
        $ganjil = Penilaian::where('siswa_id',$id)->where('semester', 'ganjil')->first();
        $genap = Penilaian::where('siswa_id',$id)->where('semester', 'genap')->first();
        return view ('penilaians.show',compact('siswa','ganjil','genap'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function edit(Penilaian $penilaian)
    {
        return 'asd';
        return view('penilaians.edit',compact('penilaian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penilaian $penilaian)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penilaian  $penilaian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penilaian $penilaian)
    {
        //
    }

    public function ubah($id, $semester)
    {
        // return 'asd';
        $siswa = Siswa::where('id',$id)->first();
        $penilaian = Penilaian::where('siswa_id', $id)->where('semester', $semester)->first();
        return view('penilaians.edit',compact('penilaian', 'siswa', 'semester'));
    }

    public function simpan(Request $request, $id, $semester)
    {
        $penilaian = Penilaian::where('siswa_id', $id)->where('semester', $semester)->first();

        // Jika data penilaian sudah ada
        if ($penilaian) {
            Penilaian::where('siswa_id', $id)->where('semester', $semester)->update([
                'tugas_1' => $request->tugas_1,
                'tugas_2' => $request->tugas_2,
                'tugas_3' => $request->tugas_3,
                'uts' => $request->uts,
                'uas' => $request->uas,
            ]);
        } else {
            Penilaian::create([
                'siswa_id' => $id,
                'tingkatan' => $request->tingkatan,
                'semester' => $semester,
                'tugas_1' => $request->tugas_1,
                'tugas_2' => $request->tugas_2,
                'tugas_3' => $request->tugas_3,
                'uts' => $request->uts,
                'uas' => $request->uas,
            ]);
        }

        // Hitung dan update nilai akhir
        $na = Penilaian::where('siswa_id', $id)->where('semester', $semester)->first();
        $nilai_akhir = ($na->tugas_1 + $na->tugas_2 + $na->tugas_3 + $na->uts +$na->uas) / 5;
        
        Penilaian::where('siswa_id', $id)->where('semester', $semester)->update([
            'nilai_akhir' => $nilai_akhir,
        ]);

        return redirect()->route('penilaians.show', $id)
        ->with(['success'=>'Nilai Siswa Berhasil Disunting !']);
    }
}
