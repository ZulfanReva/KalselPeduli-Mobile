<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenarikanDana extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'penarikan_dana';

    protected $fillable = [
        'proyek_penggalangan_id',
        'pemohon_penggalangan_id',
        'sudah_diterima',
        'sudah_disetujui',
        'jumlah_diminta',
        'jumlah_diterima',
        'nama_bank',
        'nama_rekening',
        'nomor_rekening',
        'bukti_penarikan',
    ];

    // Relasi
    public function proyekPenggalangan()
    {
        return $this->belongsTo(ProyekPenggalangan::class);
    }

    public function pemohonPenggalangan()
    {
        return $this->belongsTo(PemohonPenggalangan::class);
    }
}
