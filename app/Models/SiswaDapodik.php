<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaDapodik extends Model
{
    use HasFactory;

    protected $table = 'siswa_dapodik';

    protected $fillable = [
        'siswa_id', 'asal_sekolah', 'nis', 'nomor_peserta', 'nomor_ijasah', 'hobi', 'cita_cita'
    ]; 
}
