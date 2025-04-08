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

        return view('frontend.views.index', compact('kategori', 'proyekPenggalangan'));
    }

    public function kategori(Kategori $kategori)
    {
        return view('frontend.views.kategori', compact('kategori'));
    }

    public function detail(ProyekPenggalangan $proyekPenggalangan)
    {
        $proyek = $proyekPenggalangan; 
        $target_tercapai = $proyek->TotalDonasiTerkumpul() >= $proyek->target_donasi;
        return view('frontend.views.detail', compact('proyek', 'target_tercapai'));
    }

    public function dukungan (ProyekPenggalangan $proyekPenggalangan)
    {
        $proyek = $proyekPenggalangan; 
        return view('frontend.views.kirim-dukungan', compact('proyek'));
    }
}
