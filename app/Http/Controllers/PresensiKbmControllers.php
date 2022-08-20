<?php

namespace App\Http\Controllers;

use App\Models\{PresensiKbm, Guru, MataPelajaran, Siswa};
use Illuminate\Http\Request;

class PresensiKbmControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($tingkatan, $kelas, $mapel)
    {
        return view ('presensikbm.create',compact('tingkatan', 'kelas', 'mapel'));
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
     * @param  \App\Models\PresensiKbm  $presensiKbm
     * @return \Illuminate\Http\Response
     */
    public function show(PresensiKbm $presensiKbm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PresensiKbm  $presensiKbm
     * @return \Illuminate\Http\Response
     */
    public function edit(PresensiKbm $presensiKbm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PresensiKbm  $presensiKbm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        PresensiKbm::where('id', $id)->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with(['success' => 'Berhasil Mengubah Kehadiran !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PresensiKbm  $presensiKbm
     * @return \Illuminate\Http\Response
     */
    public function destroy(PresensiKbm $presensiKbm)
    {
        //
    }

    public function list()
    {
        $gurus = Guru::get();
        return view ('presensikbm.list',compact('gurus'));
    }

    public function listGuru($id)
    {
        $guru = Guru::find($id);
        $guru->kelas = json_decode($guru->kelas);
        $guru->mapel = json_decode($guru->mapel);
        return view ('presensikbm.list-guru',compact('guru'));
    }

    public function semester($jenjang, $tingkatan, $kelas, $mapel_nm)
    {
        $mapel = MataPelajaran::where('nama', $mapel_nm)->first();
        return view ('presensikbm.list-semester',compact('jenjang', 'tingkatan', 'kelas', 'mapel'));
    }

    public function tanggal($jenjang, $tingkatan, $kelas, $mapel_nm, $semester)
    {
        $mapel = MataPelajaran::where('nama', $mapel_nm)->first();
        $presensis = PresensiKbm::select('tanggal')->where('mapel_id', $mapel->id)->distinct()->get();
        return view ('presensikbm.list-tanggal',compact('presensis', 'jenjang', 'tingkatan', 'kelas', 'mapel', 'semester'));
    }

    public function buat($jenjang, $tingkatan, $kelas, $mapel, $semester)
    {
        return view ('presensikbm.create',compact('jenjang', 'tingkatan', 'kelas', 'mapel', 'semester'));
    }

    public function tambah(Request $request)
    {
        $siswas = Siswa::where('tingkatan', $request->tingkatan)->where('kelas', $request->kelas)->get();
        $mapel = MataPelajaran::where('nama', $request->mapel)->first();

        foreach ($siswas as $siswa) {
            PresensiKbm::create([
                'siswa_id' => $siswa->id,
                'tanggal' => $request->tanggal,
                'mapel_id' => $mapel->id,
                'jenjang' => $request->jenjang,
                'tingkatan' => $request->tingkatan,
                'kelas' => $request->kelas,
                'semester' => $request->semester,
                'status' => 'tidak hadir'
            ]);
        }

        return redirect()->route('presensikbms.tanggal', [$request->jenjang, $request->tingkatan, $request->kelas, $request->mapel, $request->semester])
            ->with(['success'=>'Tanggal KBM Berhasil Ditambahkan !']);
    }

    public function input($jenjang, $tingkatan, $kelas, $mapel_nm, $tanggal)
    {
        $mapel = MataPelajaran::where('nama', $mapel_nm)->first();
        $presensis = PresensiKbm::where('tanggal', $tanggal)->get();
        return view ('presensikbm.edit',compact('presensis', 'jenjang', 'tingkatan', 'kelas', 'mapel', 'tanggal'));
    }

    public function updateAll(Request $request)
    {
        $presensis = PresensiKbm::where('tanggal', $request->tanggal)->where('mapel_id', $request->mapel)->get();
        
        foreach ($presensis as $presensi) {
            PresensiKbm::whereId($presensi->id)->update([
                'status' => 'hadir'
            ]);
        }

        return redirect()->back()->with(['success' => 'Berhasil Mengubah Kehadiran !']);
    }
}
