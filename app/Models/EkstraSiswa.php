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
        return $this->hasMany(Ekstra::class,'id', 'foreign_ekstra');
    }
}
