<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hapalan extends Model
{
    use HasFactory;

    protected $fillable = [
        'foreign',
        'hapalan',
        'tanggal'
    ];
}
