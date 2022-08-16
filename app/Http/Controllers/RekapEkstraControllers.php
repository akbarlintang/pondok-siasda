<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Siswa, PresensiEkstra};

class RekapEkstraControllers extends Controller
{
    public function show($id)
    {
        $siswa = Siswa::where('id',$id)->first();
        // return $siswa->ekstra_siswas->id;
        $presensis = PresensiEkstra::where('foreign_ekstrasiswa', $siswa->ekstra_siswas->id)->get();
        // return $presensis;
        // $ekstrakurikuler = DB::table('ekstras')->get();
        return view('rekapekstras.show',compact('siswa', 'presensis'));
    }
}
