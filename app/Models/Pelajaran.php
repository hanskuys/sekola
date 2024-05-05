<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    use HasFactory;
    protected $table = 'pelajaran';
    protected $fillable = [
        'pelajaran'
    ];

    public function bridge()
    {
        return $this->belongsToMany(Karyawan::class, 'karyawan_tugas', 'jabatan_id', 'karyawan_id');
    }

    public function penilaian()
    {
        return $this->hasOne(NilaiPelajaran::class, 'pelajaran_id');
    }

    public function guru()
    {
        return $this->belongsToMany(Karyawan::class, 'pelajaran_guru', 'pelajaran_id', 'guru_id');
    }
}
