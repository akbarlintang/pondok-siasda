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
        if ($request->status == 'hadir') {
            PresensiKbm::where('id', $request->id)->update([
                'status' => $request->status,
                'keterangan' => null
            ]);
    
            return redirect()->back()->with(['success' => 'Berhasil Mengubah Kehadiran !']);
        } else {
            return redirect()->route('presensikbms.keterangan', [$request->id, $request->jenjang, $request->tingkatan, $request->kelas, $request->mapel, $request->semester, $request->guru_id, $request->tanggal]);
        }
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

    public function semester($jenjang, $tingkatan, $kelas, $mapel_nm, $guru_id)
    {
        $guru =  Guru::find($guru_id);
        $mapel = MataPelajaran::where('nama', $mapel_nm)->first();
        return view ('presensikbm.list-semester',compact('jenjang', 'tingkatan', 'kelas', 'mapel', 'guru'));
    }

    public function tanggal($jenjang, $tingkatan, $kelas, $mapel_nm, $semester, $guru_id)
    {
        $mapel = MataPelajaran::where('nama', $mapel_nm)->first();
        $presensis = PresensiKbm::select('tanggal')->where('mapel_id', $mapel->id)->where('semester', $semester)->distinct()->orderBy('tanggal', 'DESC')->get();
        return view ('presensikbm.list-tanggal',compact('presensis', 'jenjang', 'tingkatan', 'kelas', 'mapel', 'semester', 'guru_id'));
    }

    public function buat($jenjang, $tingkatan, $kelas, $mapel, $semester, $guru_id)
    {
        return view ('presensikbm.create',compact('jenjang', 'tingkatan', 'kelas', 'mapel', 'semester', 'guru_id'));
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

        return redirect()->route('presensikbms.tanggal', [$request->jenjang, $request->tingkatan, $request->kelas, $request->mapel, $request->semester, $request->guru_id])
            ->with(['success'=>'Tanggal KBM Berhasil Ditambahkan !']);
    }

    public function input($jenjang, $tingkatan, $kelas, $mapel_nm, $semester, $guru_id, $tanggal)
    {
        $mapel = MataPelajaran::where('nama', $mapel_nm)->first();
        $presensis = PresensiKbm::where('tanggal', $tanggal)->get();
        return view ('presensikbm.edit',compact('presensis', 'jenjang', 'tingkatan', 'kelas', 'mapel', 'tanggal', 'semester','guru_id'));
    }

    public function updateAll(Request $request)
    {
        $presensis = PresensiKbm::where('tanggal', $request->tanggal)->where('mapel_id', $request->mapel)->get();
        
        foreach ($presensis as $presensi) {
            PresensiKbm::whereId($presensi->id)->update([
                'status' => 'hadir',
                'keterangan' => null
            ]);
        }

        return redirect()->back()->with(['success' => 'Berhasil Mengubah Kehadiran !']);
    }

    public function keterangan($id, $jenjang, $tingkatan, $kelas, $mapel, $semester, $guru_id, $tanggal)
    {
        $data = PresensiKbm::whereId($id)->first();
        $jenjang = $jenjang;
        $tingkatan = $tingkatan;
        $kelas = $kelas;
        $mapel = $mapel;
        $semester = $semester;
        $guru_id = $guru_id;
        $tanggal = $tanggal;

        return view ('presensikbm.keterangan',compact('data', 'jenjang', 'tingkatan', 'kelas', 'mapel', 'tanggal', 'semester','guru_id'));
    }

    public function keteranganUpdate(Request $request)
    {
        PresensiKbm::whereId($request->id)->update([
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);

        return redirect()->route('presensikbms.input', [$request->jenjang, $request->tingkatan, $request->kelas, $request->mapel, $request->semester, $request->guru_id, $request->tanggal])
            ->with(['success'=>'Status Kehadiran Berhasil Diubah !']);
    }
}
