<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donatur extends Model
{
    use HasFactory;

    protected $table = 'donatur';

    protected $fillable = [
        'nama',
        'nomor_whatsapp',
        'proyek_penggalangan_id',
        'jumlah_donasi',
        'catatan',
        'sudah_dibayar',
        'bukti_pembayaran',
    ];

    public function proyekPenggalangan()
    {
        return $this->belongsTo(ProyekPenggalangan::class);
    }
}
