<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use App\Models\EkstraSiswa;

class EkstraSiswaControllers extends Controller
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
        
        $siswas = Siswa::with('ekstra_siswas')
        ->where('tingkatan',$tingkat)
        ->where('kelas',$kelas)
        ->where('jenjang',$jenjang)
        ->paginate(5);
        
        return view ('ekstrasiswas.index',compact('siswas','tingkat','kelas','jenjang'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('ekstrasiswas.create');
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
    public function edit($ekstrasiswa)
    {
        $siswas = Siswa::where('id',$ekstrasiswa)->first();
        $ekstrakurikuler = DB::table('ekstras')->get();
        return view('ekstrasiswas.edit',compact('siswas','ekstrakurikuler'));
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
        return 'asd';
        return $request;
        $ekstra = EkstraSiswa::where('foreign_siswa', $id)->first();
        // return $ekstra;
        if ($ekstra) {
            EkstraSiswa::where('foreign_siswa', $id)->update([
                'foreign'
            ]);
        } else {
            # code...
        }
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

    public function ubah(Request $request, $id)
    {
        $ekstra = EkstraSiswa::where('foreign_siswa', $id)->first();

        if ($ekstra) {
            EkstraSiswa::where('foreign_siswa', $id)->update([
                'foreign_ekstra' => $request->ekstra
            ]);
        } else {
            EkstraSiswa::create([
                'foreign_ekstra' => $request->ekstra,
                'foreign_siswa' => $id
            ]);
        }

        return redirect()->route('ekstrasiswas.index')
        ->with(['success' => 'Berhasil Menguybah Ekstra Siswa']);
    }
}
