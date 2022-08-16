<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EkstraSiswa extends Model
{
    use HasFactory;

    protected $fillable =[
        'foreign_ekstra',
        'foreign_siswa'
    ];

    public function ekstra()
    {
        return $this->hasOne(Ekstra::class,'id', 'foreign_ekstra');
    }

    public function presensiekstra()
    {
        return $this->hasMany(PresensiEkstra::class,'id', 'foreign_ekstra');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'foreign_siswa', 'id', 'siswa');
    }
}
