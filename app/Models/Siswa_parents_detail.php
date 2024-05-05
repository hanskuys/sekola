<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa_parents_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'siswa_id',
        'nama_ortu',
        'nik',
        'tanggal_lahir',
        'pendidikan',
        'pekerjaan',
        'penghasilan',
        'no_telp',
        'type',
    ];
}
