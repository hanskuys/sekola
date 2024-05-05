<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenDetail extends Model
{
    use HasFactory;
    protected $table = 'absen_details';

    protected $fillable = [
        'siswa_id',
        'status'
    ];

    public function absen()
    {
        return $this->belongsTo(Absen::class, 'absen_id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
