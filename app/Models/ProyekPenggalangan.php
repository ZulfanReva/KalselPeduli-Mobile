<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProyekPenggalangan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pemohon_penggalangan_id',
        'kategori_id',
        'status_aktif',
        'sudah_selesai',
        'nama',
        'slug',
        'foto',
        'deskripsi',
        'target_donasi',
    ];

    // Relasi
    public function pemohonPenggalangan()
    {
        return $this->belongsTo(PemohonPenggalangan::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function donatur()
    {
        return $this->hasMany(Donatur::class);
    }

    public function penarikanDana()
    {
        return $this->hasMany(PenarikanDana::class);
    }

    public function laporanPenggalangan()
    {
        return $this->hasMany(LaporanPenggalangan::class);
    }
}
