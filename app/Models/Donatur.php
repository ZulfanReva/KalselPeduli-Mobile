<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donatur extends Model
{
    protected $fillable = [
        'nama',
        'proyek_penggalangan_id',
        'jumlah_donasi',
        'catatan',
        'sudah_dibayar',
        'bukti_pembayaran',
    ];

    // Relasi
    public function proyekPenggalangan()
    {
        return $this->belongsTo(ProyekPenggalangan::class);
    }
}
