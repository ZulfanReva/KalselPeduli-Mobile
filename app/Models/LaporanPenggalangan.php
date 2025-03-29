<?php

namespace App\Models;

use App\Models\ProyekPenggalangan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LaporanPenggalangan extends Model
{
    use HasFactory, SoftDeletes;

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
