<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiEkstra extends Model
{
    use HasFactory;

    protected $fillable =[
        'foreign_ekstrasiswa',
        'tanggal',
        'status'
    ];

    public function ekstra_siswas()
    {
        return $this->belongsTo(EkstraSiswa::class, 'foreign_ekstrasiswa', 'id', 'ekstra_siswas');
    }
}
