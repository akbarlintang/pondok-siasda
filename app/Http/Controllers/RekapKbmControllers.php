<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Siswa, PresensiKbm};

class RekapKbmControllers extends Controller
{
    public function index()
    {
        return view('rekapkbm.index');
    }

    public function show($semester, $tingkat)
    {
        $presensis = PresensiKbm::where('siswa_id', auth()->user()->Siswa->id)->where('tingkatan', $tingkat)->where('semester', $semester)->select('mapel_id')->distinct()->get();
        return view('rekapkbm.show',compact('presensis', 'semester', 'tingkat'));
    }

    public function rekap($semester, $tingkat, $mapel)
    {
        $presensis = PresensiKbm::where('siswa_id', auth()->user()->Siswa->id)->where('tingkatan', $tingkat)->where('semester', $semester)->where('mapel_id', $mapel)->get();
        return view('rekapkbm.rekap',compact('presensis', 'semester', 'tingkat', 'mapel'));
    }
}
