<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaOrtu extends Model
{
    use HasFactory;

    protected $table = 'siswa_ortu';

    protected $fillable = [
        'siswa_id',
        'nama_ayah',
        'nama_ibu',
        'nama_wali',
        'nik_ayah',
        'nik_ibu',
        'nik_wali',
        'lahir_ayah',
        'lahir_ibu',
        'lahir_wali',
        'pendidikan_ayah',
        'pendidikan_ibu',
        'pendidikan_wali',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'pekerjaan_wali',
        'penghasilan_ayah',
        'penghasilan_ibu',
        'penghasilan_wali',
        'no_telp_ayah',
        'no_telp_ibu',
        'no_telp_wali',
    ];
}
