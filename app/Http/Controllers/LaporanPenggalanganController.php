<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanPenggalangan;
use App\Models\PenarikanDana;
use Illuminate\Support\Facades\Auth;

class LaporanPenggalanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $pemohonPenggalanganId = $user->pemohonPenggalangan->id;

        $penarikanDana = PenarikanDana::where('pemohon_penggalangan_id', $pemohonPenggalanganId)
            ->orderByDesc('id')->get();

        return view('admin.laporan_penggalangan.index', compact('penarikanDana'));
    }

    public function laporan_detail(PenarikanDana $penarikanDana)
    {
        return view('admin.laporan_penggalangan.details', compact('penarikanDana'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LaporanPenggalangan $laporanPenggalangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LaporanPenggalangan $laporanPenggalangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LaporanPenggalangan $laporanPenggalangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LaporanPenggalangan $laporanPenggalangan)
    {
        //
    }
}
