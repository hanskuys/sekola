<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa_alamat_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'alamat',
        'rt',
        'rw',
        'kode_pos',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'lintang',
        'bujur',
        'jarak_rumah',
        'waktu_tempuh'
    ];
}
