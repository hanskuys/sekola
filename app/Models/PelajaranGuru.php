<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelajaranGuru extends Model
{
    use HasFactory;

    protected $table = 'pelajaran_guru';

    protected $fillable = [
        'pelajaran_id', 'guru_id'
    ];

    public function guru(){
        return $this->belongsTo(Karyawan::class, 'guru_id');
    }

    public function pelajaran(){
        return $this->belongsTo(Pelajaran::class, 'pelajaran_id');
    }
}
