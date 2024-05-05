<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaDetail extends Model
{
    use HasFactory;
    protected $table = 'siswa_detail';
    protected $fillable = [
        'siswa_id',
        'nisn',
        'nik',
        'no_kk',
        'no_regis_kk',
        'tinggal_bersama',
        'moda_transportasi',
        'anak_ke',
        'kip',
        'tb',
        'bb',
        'jumlah_sodara',
        'tahun_ajaran',
    ];
}
