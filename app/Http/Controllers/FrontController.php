<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\ProyekPenggalangan;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreDonaturRequest;
use App\Http\Requests\StorePenarikanDanaRequest;

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

    public function dukungan(ProyekPenggalangan $proyekPenggalangan)
    {
        $proyek = $proyekPenggalangan;
        return view('frontend.views.kirim-dukungan', compact('proyek'));
    }

    public function pembayaran(ProyekPenggalangan $proyekPenggalangan, $jumlah_donasi)
    {
        $proyek = $proyekPenggalangan;
        return view('frontend.views.pembayaran', compact('proyek', 'jumlah_donasi'));
    }

    public function store(StoreDonaturRequest $request, ProyekPenggalangan $proyekPenggalangan, $jumlah_donasi)
    {
        DB::transaction(function () use ($request, $proyekPenggalangan, $jumlah_donasi) {
            $validated = $request->validated();

            if ($request->hasFile('bukti_pembayaran')) {
                $buktipembayaranPath = $request->file('bukti_pembayaran')->store('bukti_pembayarans', 'public');
                $validated['bukti_pembayaran'] = $buktipembayaranPath;
            }

            $validated['proyek_penggalangan_id'] = $proyekPenggalangan->id;
            $validated['jumlah_donasi'] = $jumlah_donasi;
            $validated['is_paid'] = false;

            $donatur = Donatur::create($validated);
        });

        return redirect()->route('frontend.detail', $proyekPenggalangan->slug);
    }
}
