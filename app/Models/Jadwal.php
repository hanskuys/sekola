<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = "jadwal";

    protected $fillable = [
        'smt',
        'karyawan_pelajaran_id',
        'hari'
    ];

    
    public function tahun()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_id');
    }
    
    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class, 'pelajaran_id');
    }
    
    public function guru()
    {
        return $this->belongsTo(Karyawan::class, 'guru_id');
    }
}
