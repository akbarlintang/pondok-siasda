<?php

namespace App\Http\Controllers;

use App\Models\{Role, Pengumuman};
use Illuminate\Http\Request;
use Storage;

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
        if ($request->file) {
            $file = $request->file;
            $fileName = $file->hashname();
            $file->storeAs('public/pengumuman', $fileName);
        } else {
            $fileName = null;
        }

        Pengumuman::create([
            'tanggal' => date('Y-m-d'),
            'roles' => json_encode($request->role),
            'isi' => $request->isi,
            'file' => $fileName
        ]);

        return redirect()->route('pengumuman.index')->with(['success' => 'Berhasil Membuat Pengumuman !']);
    }

    public function download($id){
        $pengumuman = Pengumuman::find($id);
        $unduh = Storage::url('public/pengumuman/'.$pengumuman->file);

        return response()->download(public_path($unduh));
    }
}
