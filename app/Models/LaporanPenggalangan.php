<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPenggalangan extends Model
{
    protected $fillable = [
        'proyek_penggalangan_id',
        'nama',
        'foto',
        'catatan',
    ];

    // Relasi
    public function proyekPenggalangan()
    {
        return $this->belongsTo(ProyekPenggalangan::class);
    }
}
