<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\ProyekPenggalangan;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $proyekPenggalangan = ProyekPenggalangan::with('kategori', 'pemohonPenggalangan')->where('status_aktif', 1)->orderByDesc('id')->get();

        return view('frontend.views.index', compact ('kategori', 'proyekPenggalangan'));
    }
}
