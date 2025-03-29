<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = [
        'nama',
        'slug',
        'ikon',
    ];

    // Relasi
    public function proyekPenggalangan()
    {
        return $this->hasMany(ProyekPenggalangan::class);
    }
}
