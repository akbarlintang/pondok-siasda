<?php

namespace App\Http\Controllers;

use App\Models\{Siswa, Penilaian, MataPelajaran};
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
        $siswa = Siswa::where('id',$id)->first();
        $penilaian = Penilaian::where('siswa_id', $id)->where('tingkatan', $siswa->tingkatan)->where('semester', $semester)->first();
        return view('penilaians.create',compact('penilaian', 'siswa', 'semester'));
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
        $ganjil = Penilaian::where('siswa_id',$id)->where('tingkatan', $siswa->tingkatan)->where('semester', 'ganjil')->first();
        $genap = Penilaian::where('siswa_id',$id)->where('tingkatan', $siswa->tingkatan)->where('semester', 'genap')->first();
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
    
    public function list($id, $semester)
    {
        $siswa = Siswa::where('id',$id)->first();
        $nilais = Penilaian::where('siswa_id',$id)->where('tingkatan', $siswa->tingkatan)->where('semester', $semester)->get();
        return view ('penilaians.list',compact('siswa', 'nilais', 'semester'));
    }

    public function buat($id, $semester)
    {
        $siswa = Siswa::where('id',$id)->first();
        $mapels = MataPelajaran::get();
        return view('penilaians.create',compact('siswa', 'semester', 'mapels'));
    }

    public function tambah(Request $request, $id, $semester)
    {
        // Hitung nilai akhir
        $nilai_akhir = ($request->tugas_1 + $request->tugas_2 + $request->tugas_3 + $request->uts +$request->uas) / 5;

        $penilaian = Penilaian::where('siswa_id', $id)->where('tingkatan', $request->tingkatan)->where('semester', $semester)->where('mapel', $request->mapel)->first();

        if (isset($penilaian)) {
            return redirect()->route('penilaians.list', [$id, $semester])
            ->with(['failed'=>'Nilai Siswa Dengan Mata Pelajaran '.$request->mapel.' Sudah Ada !']);
        } else {
            Penilaian::create([
                'siswa_id' => $id,
                'tingkatan' => $request->tingkatan,
                'semester' => $semester,
                'mapel' => $request->mapel,
                'tugas_1' => $request->tugas_1,
                'tugas_2' => $request->tugas_2,
                'tugas_3' => $request->tugas_3,
                'uts' => $request->uts,
                'uas' => $request->uas,
                'nilai_akhir' => $nilai_akhir
            ]);
    
            return redirect()->route('penilaians.list', [$id, $semester])
            ->with(['success'=>'Nilai Siswa Berhasil Ditambahkan !']);
        }
    }

    public function ubah($id, $semester)
    {
        $penilaian = Penilaian::whereId($id)->first();
        $mapels = MataPelajaran::get();
        return view('penilaians.edit',compact('penilaian', 'semester', 'mapels'));
    }

    public function simpan(Request $request, $id, $semester)
    {
        $penilaian = Penilaian::whereId($id)->first();
        // Hitung nilai akhir
        $nilai_akhir = ($request->tugas_1 + $request->tugas_2 + $request->tugas_3 + $request->uts +$request->uas) / 5;

        Penilaian::whereId($id)->update([
            'tugas_1' => $request->tugas_1,
            'tugas_2' => $request->tugas_2,
            'tugas_3' => $request->tugas_3,
            'uts' => $request->uts,
            'uas' => $request->uas,
            'nilai_akhir' => $nilai_akhir
        ]);

        return redirect()->route('penilaians.list', [$penilaian->siswa_id, $semester])
        ->with(['success'=>'Nilai Siswa Berhasil Disunting !']);
    }
}
