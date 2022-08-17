<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Siswa, Penilaian};

class RekapNilaiControllers extends Controller
{
    public function index($id)
    {
        $siswa = Siswa::where('id',$id)->first();

        $ganjil = Penilaian::where('siswa_id',$id)->where('semester', 'ganjil')->orderBy('tingkatan')->get();
        $genap = Penilaian::where('siswa_id',$id)->where('semester', 'genap')->orderBy('tingkatan')->get();
        
        if (isset($ganjil)) {
            
        }
        
        return view('rekapnilai.index',compact('siswa', 'ganjil', 'genap'));
    }

    public function show($id)
    {
        $siswa = Siswa::where('id',$id)->first();
        
        return view('rekapnilai.show',compact('siswa'));
    }
}
