<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Guru, User, Role, MataPelajaran};
use Illuminate\Support\Facades\Hash;

class GuruControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $gurus = Guru::paginate(5);
        
        return view ('gurus.index',compact('gurus'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mapels = MataPelajaran::get();
        return view('gurus.create', compact('mapels'));
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
            'name' => $request->nama_guru,
            'email' => $request->email_guru,
            'password' => Hash::make('password'),
        );

        User::create($user_data);
        $user = User::latest('id')->first();

        // Beri role user untuk user yang baru dibuat
        $user->assignRole('Guru');

        $form_data = array(
            'nama'       =>   $request->nama_guru,
            'nik'       =>   $request->nik,
            'jenjang'       =>   $request->jenjang,
            'tingkatan'       =>   $request->tingkatan,
            'kelas'       =>   json_encode($request->kelas),
            'mapel'       =>   json_encode($request->mapel),
            'tempat_lahir'       =>   $request->tempat_lahir,
            'tanggal_lahir'       =>   $request->tanggal_lahir,
            'tahun_masuk' => $request->tahun_masuk,
            'user_id' => $user->id,
        );

        Guru::create($form_data);

        return redirect()->route('gurus.index')
        ->with(['success' => 'Berhasil Menambah Guru']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function edit(Guru $guru)
    {
        $guru->kelas = json_decode($guru->kelas);
        $guru->mapel = json_decode($guru->mapel);
        $mapels = MataPelajaran::get();
        return view('gurus.edit',compact('guru', 'mapels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guru $guru)
    {
        Guru::where('id',$guru->id)->update([
            'nama'       =>   $request->nama_guru,
            'nik'       =>   $request->nik,
            'jenjang'       =>   $request->jenjang,
            'tingkatan'       =>   $request->tingkatan,
            'kelas'       =>   json_encode($request->kelas),
            'mapel'       =>   json_encode($request->mapel),
            'tempat_lahir'       =>   $request->tempat_lahir,
            'tanggal_lahir'       =>   $request->tanggal_lahir,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        User::where('id', $guru->user_id)->update([
            'email'     => $request->email_guru
        ]);

        return redirect()->route('gurus.index')
        ->with(['success'=>'Guru Berhasil Disunting !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guru  $guru
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guru $guru)
    {
        // return $guru;
        // $guru->delete();

        // return redirect()->route('gurus.index')
        // ->with(['success'=>'Guru Berhasil dihapus !']);
    }

    public function delete($id)
    {
        // return $id;
        Guru::where('id', $id)->delete();

        return redirect()->route('gurus.index')
        ->with(['success'=>'Guru Berhasil dihapus !']);
    }
}
