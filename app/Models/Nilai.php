<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $fillable = [
        'siswa_id',
        'karyawan_pelajaran_id',
        'nilai',
        'type'
    ];

    public function tahun()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    
    public function pelajaran()
    {
        return $this->belongsTo(Pelajaran::class, 'kelas_id');
    }

    public function detail()
    {
        return $this->hasMany(NilaiDetail::class, 'nilai_id');
    }
}
