<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemohonPenggalangan extends Model
{
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
