<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;

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
