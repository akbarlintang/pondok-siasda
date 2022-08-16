<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable =[
        'siswa_id',
        'tingkatan',
        'semester',
        'tugas_1',
        'tugas_2',
        'tugas_3',
        'uts',
        'uas',
        'nilai_akhir',
    ];
}
