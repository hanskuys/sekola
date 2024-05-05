<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class NilaiDetail extends Model
{
    use HasFactory;

    protected $table = 'nilai_detail';
    protected $fillable = [
        'nilai_id',
        'siswa_id',
        'nilai',
    ];

    public function nilai(): BelongsTo
    {
        return $this->belongsTo(Nilai::class, 'nilai_id');
    }

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }
}
