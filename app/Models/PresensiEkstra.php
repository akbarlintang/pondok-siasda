<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PresensiEkstra extends Model
{
    use HasFactory;

    protected $fillable =[
        'foreign_siswa',
        'foreign_ekstrasiswa',
        'tanggal',
        'status'
    ];
}
