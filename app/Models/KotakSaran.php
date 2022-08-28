<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotakSaran extends Model
{
    use HasFactory;

    protected $table = 'kotak_sarans';

    protected $fillable =[
        'tanggal',
        'roles',
        'penerima_id',
        'pesan'
    ];

    public function Siswa()
    {
        return $this->belongsTo(Siswa::class, 'penerima_id', 'id');
    }
}
