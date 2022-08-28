<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Siswa, User, Role};
use Illuminate\Support\Facades\Hash;
use PDF;

class SiswaControllers extends Controller
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
        
        return view ('siswas.index',compact('siswas','tingkat','kelas','jenjang'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_data = array(
            'name' => $request->nama_siswa,
            'email' => $request->email_siswa,
            'password' => Hash::make('password'),
        );

        User::create($user_data);
        $user = User::latest('id')->first();

        // Beri role user untuk user yang baru dibuat
        $user->assignRole('Siswa');

        if ($request->file) {
            $file = $request->file;
            $fileName = $file->hashname();
            $file->storeAs('public/foto', $fileName);
        } else {
            $fileName = null;
        }

        $form_data = array(
            'nama_siswa'       =>   $request->nama_siswa,
            'nis'       =>   $request->nis,
            'jenjang'       =>   $request->jenjang,
            'tingkatan'       =>   $request->tingkatan,
            'kelas'       =>   $request->kelas,
            'tempat_lahir'       =>   $request->tempat_lahir,
            'tanggal_lahir'       =>   $request->tanggal_lahir,
            'alamat'       =>   $request->alamat,
            'jenis_kelamin'       =>   $request->jenis_kelamin,
            'agama'       =>   $request->agama,
            'tahun_masuk' => $request->tahun_masuk,
            'wali_kamar'       =>   $request->wali_kamar,
            'nomor_wali'       =>   $request->nomor_wali,
            'asal_sekolah'       =>   $request->asal_sekolah,
            'alamat_asal_sekolah'       =>   $request->alamat_asal_sekolah,
            'tahun_lulus'       =>   $request->tahun_lulus,
            'no_surat_lulus'       =>   $request->no_surat_lulus,
            'nama_ayah'       =>   $request->nama_ayah,
            'nama_ibu'       =>   $request->nama_ibu,
            'email_ortu'       =>   $request->email_siswa,
            'foto'          => $fileName,
            'user_id' => $user->id,
        );

        Siswa::create($form_data);

        $form = array(

        );

        return redirect()->route('siswas.index')
        ->with(['success' => 'Berhasil Menambah Siswa']);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $siswa)
    {
        return view('siswas.show',compact('siswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        return view('siswas.edit',compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        if ($request->file) {
            $file = $request->file;
            $fileName = $file->hashname();
            $file->storeAs('public/foto', $fileName);
        } else {
            $fileName = null;
        }

        Siswa::where('id',$siswa->id)->update([
            'nama_siswa'       =>   $request->nama_siswa,
            'nis'       =>   $request->nis,
            'jenjang'       =>   $request->jenjang,
            'tingkatan'       =>   $request->tingkatan,
            'kelas'       =>   $request->kelas,
            'tempat_lahir'       =>   $request->tempat_lahir,
            'tanggal_lahir'       =>   $request->tanggal_lahir,
            'alamat'       =>   $request->alamat,
            'jenis_kelamin'       =>   $request->jenis_kelamin,
            'agama'       =>   $request->agama,
            'tahun_masuk' => $request->tahun_masuk,
            'wali_kamar'       =>   $request->wali_kamar,
            'nomor_wali'       =>   $request->nomor_wali,
            'asal_sekolah'       =>   $request->asal_sekolah,
            'alamat_asal_sekolah'       =>   $request->alamat_asal_sekolah,
            'tahun_lulus'       =>   $request->tahun_lulus,
            'no_surat_lulus'       =>   $request->no_surat_lulus,
            'nama_ayah'       =>   $request->nama_ayah,
            'nama_ibu'       =>   $request->nama_ibu,
            'foto'          => $fileName
        ]);

        return redirect()->route('siswas.index')
        ->with(['success'=>'Siswa Berhasil Disunting !']);
    }

    public function index2()
    {
        return view('siswas.index2');
    }

    public function add(Request $request)
    {
        // Siswa::get();
        Siswa::where('tahun_masuk',$request->tahun)->increment('tingkatan');

        return redirect()->route('siswas.index2')
        ->with(['success'=>'Siswa Berhasil Disunting !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $id;
    }

    public function hapus($id)
    {
        Siswa::destroy($id);

        return redirect()->route('siswas.index')
        ->with(['success'=>'Siswa Berhasil Dihapus !']);
    }

    public function cetak($id){
        $siswa = Siswa::whereId($id)->first();

        $pdf = PDF::loadview('siswas.pdf', compact('siswa'))->setPaper('A4','portrait');
        return $pdf->stream("biodata_".$siswa->nama_siswa.".pdf");
    }
}
