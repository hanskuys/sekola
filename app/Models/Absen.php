<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'karyawan_pelajaran_id',
        'status',
        'tanggal',
        'keterangan'
    ];

    public function tahun()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    
    public function detail()
    {
        return $this->hasMany(AbsenDetail::class, 'absen_id');
    }
}
