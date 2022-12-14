<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable =[
        'nik',
        'nama',
        'jenjang',
        'tingkatan',
        'kelas',
        'mapel',
        'tempat_lahir',
        'tanggal_lahir',
        'tahun_masuk',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
