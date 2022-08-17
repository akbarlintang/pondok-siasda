<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Siswa, PresensiEkstra};

class RekapEkstraControllers extends Controller
{
    public function show($id)
    {
        $siswa = Siswa::where('id',$id)->first();
        
        if (isset($siswa->ekstra_siswas)) {
            $presensis = PresensiEkstra::where('foreign_ekstrasiswa', $siswa->ekstra_siswas->id)->get();
        } else {
            $presensis = null;
        }
        
        return view('rekapekstras.show',compact('siswa', 'presensis'));
    }
}
