<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'kelas', 'karyawan_id', 'lk', 'pr', 'jml'
    ];

    public function guru(){
        return $this->belongsTo(Karyawan::class, 'karyawan_id', 'id');
    }
    
    public function bridge(){
        return $this->hasOne(KelasBridge::class, 'kelas_id');
    }
}
