<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable =[
      'nis',
      'nama_siswa',
      'jenjang',
      'tingkatan',
      'kelas',
      'tempat_lahir',
      'tanggal_lahir',
      'alamat',
      'jenis_kelamin',
      'agama',
      'tahun_masuk',
      'wali_kamar',
      'nomor_wali',
      'asal_sekolah',
      'alamat_asal_sekolah',
      'tahun_lulus',
      'no_surat_lulus',
      'nama_ayah',
      'nama_ibu',
      'email_ortu',
      'foto',
      'user_id',
    ];

    public function spps()
    {
        return $this->hasMany(Spp::class,'foreign');
    }

    public function hapalans()
    {
        return $this->hasMany(Hapalan::class,'foreign');
    }

    public function evaluasis()
    {
        return $this->hasMany(Evaluasi::class,'foreign');
    }

    public function ekstra_siswas()
    {
        return $this->hasOne(EkstraSiswa::class,'foreign_siswa');
    }

    public function presensi_ekstra()
    {
        return $this->hasMany(PresensiEkstra::class,'foreign_siswa');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
}
