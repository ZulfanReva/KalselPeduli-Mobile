<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PemohonPenggalangan extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'pemohon_penggalangan';

    protected $fillable = [
        'user_id',
        'status_aktif',
    ];

    // Relasi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function proyekPenggalangan()
    {
        return $this->hasMany(ProyekPenggalangan::class);
    }
}
