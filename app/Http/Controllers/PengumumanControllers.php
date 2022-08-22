<?php

namespace App\Http\Controllers;

use App\Models\{Role, Pengumuman};
use Illuminate\Http\Request;

class PengumumanControllers extends Controller
{
    public function index(Request $request)
    {
        $datas = Pengumuman::get();
        $roles = auth()->user()->getRoleNames();
        $pengumumans = [];
        foreach ($datas as $data) {
            $data->roles = json_decode($data->roles);

            foreach ($roles as $role) {
                if (in_array($role, $data->roles)) {
                    array_push($pengumumans, $data);
                }
            }
        }

        return view ('pengumuman.index', compact('pengumumans'));
    }

    public function create()
    {
        $roles = Role::get();
        return view('pengumuman.create', compact('roles'));
    }

    public function store(Request $request)
    {
        Pengumuman::create([
            'tanggal' => date('Y-m-d'),
            'roles' => json_encode($request->role),
            'isi' => $request->isi,
        ]);

        return redirect()->route('pengumuman.index')->with(['success' => 'Berhasil Membuat Pengumuman !']);
    }
}
