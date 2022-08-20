<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiKbm extends Model
{
    use HasFactory;

    protected $fillable =[
        'siswa_id',
        'tanggal',
        'mapel_id',
        'jenjang',
        'tingkatan',
        'kelas',
        'semester',
        'status'
    ];

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function Mapel()
    {
        return $this->belongsTo(MataPelajaran::class, 'mapel_id');
    }
}
