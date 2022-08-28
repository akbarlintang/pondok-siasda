<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Role, KotakSaran, Siswa};

class KotakSaranControllers extends Controller
{
    public function index(Request $request)
    {
        $datas = KotakSaran::get();
        $roles = auth()->user()->getRoleNames();
        $pesans = [];
        
        foreach ($datas as $data) {
            $data->roles = json_decode($data->roles);

            if (in_array('Admin', json_decode($roles))) {
                foreach ($roles as $role) {
                    if (in_array($role, $data->roles)) {
                        array_push($pesans, $data);
                    }
                }
            }
            
            if (in_array('Siswa', json_decode($roles))) {
                foreach ($roles as $role) {
                    if (in_array($role, $data->roles)) {
                        if ($data->penerima_id == auth()->user()->Siswa->id) {
                            array_push($pesans, $data);
                        }
                    }
                }
            }
        }

        return view ('kotaksaran.index', compact('pesans'));
    }

    public function create()
    {
        return view('kotaksaran.create');
    }

    public function store(Request $request)
    {
        KotakSaran::create([
            'tanggal' => date('Y-m-d'),
            'roles' => json_encode(["Admin"]),
            'penerima_id' => auth()->user()->Siswa->id,
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('kotak-saran.index')->with(['success' => 'Berhasil Mengirim Pesan!']);
    }

    public function balas($id)
    {
        $penerima = Siswa::find($id);
        return view('kotaksaran.balas', compact('penerima'));
    }

    public function kirim(Request $request)
    {
        KotakSaran::create([
            'tanggal' => date('Y-m-d'),
            'roles' => json_encode(["Siswa"]),
            'penerima_id' => $request->penerima_id,
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('kotak-saran.index')->with(['success' => 'Berhasil Membalas Pesan!']);
    }
}
