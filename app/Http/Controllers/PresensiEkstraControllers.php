<?php

namespace App\Http\Controllers;

use App\Models\Ekstra;
use App\Models\EkstraSiswa;
use App\Models\PresensiEkstra;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PresensiEkstraControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (is_null($request->ekstra)) {
            $ekstras = '1';
        } else {
            $ekstras = $request->ekstra;
        }
        $semua = Ekstra::get();
        $tes = Ekstra::where('id',$ekstras)->first();
        $pilihekstra = PresensiEkstra::select('tanggal')->whereHas('ekstra_siswas', function($q) use ($ekstras) {
            $q->where('ekstra_siswas.foreign_ekstra', $ekstras);
        })->distinct()->orderBy('tanggal', 'DESC')->get();
        // dd($pilihekstra);
        // dd($pilihekstra[1]->foreign_ekstra);
        // $tes = PresensiEkstra::get();
        // dd($tes);
        // $tes2 = PresensiEkstra::where($tes->ekstra_siswas[0]->foreign_ekstra,$pilihekstra);
        // $ekstrakurikuler = DB::table('presensi_ekstras')->select('tanggal')->get();
        return view('presensiekstras.index',compact('tes','semua','pilihekstra','ekstras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ekstrakurikuler = Ekstra::get();
        return view('presensiekstras.create', compact('ekstrakurikuler'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ekstra_siswa = EkstraSiswa::where('foreign_ekstra',$request->ekstra)->get();

        foreach ($ekstra_siswa as $value) {
            $form_data = array(
                'foreign_ekstrasiswa' => $value->id,
                'tanggal' => $request->tanggal,
                'status' => 'tidak hadir'
            );
            PresensiEkstra::create($form_data);
        }

        return redirect()->route('presensiekstras.index')->with(['success' => 'Berhasil Menambah Tanggal !']);
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
    public function edit($id, Request $request)
    {
        $tes = Ekstra::where('id',$request->id_ekstra)->first();
        $absen = PresensiEkstra::where('tanggal',$request->tanggal)->whereHas('ekstra_siswas', function($q) use ($request) {
            $q->where('ekstra_siswas.foreign_ekstra', $request->id_ekstra);
        })->get();
        // dd($absen[0]->tanggal);
        // dd($absen[0]->ekstra_siswas->siswa->nama_siswa);
        // dd($absen[0]->ekstra_siswas->foreign_ekstra);
        // $siswa = PresensiEkstra::where('tanggal','')->get();
        return view('presensiekstras.edit', compact('absen', 'tes'));
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
        // dd($id);
        PresensiEkstra::where('id', $id)->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with(['success' => 'Berhasil Mengubah Kehadiran !']);
    }

    public function updateAll(Request $request)
    {
        // $absen = PresensiEkstra::where('tanggal',$request->tanggal)->whereHas('ekstra_siswas', function($q) use ($request) {
        //     $q->where('ekstra_siswas.foreign_ekstra', $request->id_ekstra);
        // })->get();

        // dd($absen->id);

        // foreach ($absen as $value) {
        //     PresensiEkstra::where('id',$value->id)->update([
        //         'status' => 'hadir'
        //     ]);
        // }

        // return redirect()->route('presensiekstras.edit')->with(['success' => 'Berhasil Mengubah Kehadiran !']);
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
