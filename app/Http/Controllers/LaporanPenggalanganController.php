<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenarikanDana;
use App\Models\ProyekPenggalangan;
use Illuminate\Support\Facades\DB;
use App\Models\LaporanPenggalangan;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProyekPenggalanganRequest;
use App\Http\Requests\StoreLaporanPenggalanganRequest;

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
    public function store(StoreLaporanPenggalanganRequest $request, $proyekPenggalanganId)
    {
        /** @var \Illuminate\Http\Request $request */

        $proyekPenggalangan = ProyekPenggalangan::findOrFail($proyekPenggalanganId);
        $penarikanDanaUpdate = null; // inisialisasi di luar closure

        DB::transaction(function () use ($request, $proyekPenggalangan, &$penarikanDanaUpdate) {
            $validated = $request->validated();

            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('fotos', 'public');
                $validated['foto'] = $fotoPath;
            }

            $validated['proyek_penggalangan_id'] = $proyekPenggalangan->id;

            LaporanPenggalangan::create($validated);

            $penarikanDanaUpdate = PenarikanDana::where('proyek_penggalangan_id', $proyekPenggalangan->id)
                ->latest()
                ->first();

            if ($penarikanDanaUpdate) {
                $penarikanDanaUpdate->update([
                    'sudah_diterima' => true
                ]);
            }

            $proyekPenggalangan->update([
                'sudah_selesai' => true
            ]);
        });

        // Periksa apakah $penarikanDanaUpdate ada
        if ($penarikanDanaUpdate) {
            return redirect()->route('admin.laporan_penggalangan.details', $penarikanDanaUpdate->id);
        }

        // Jika null, redirect ke rute lain atau berikan pesan
        return redirect()->route('admin.laporan_penggalangan.index')->with('error', 'Penarikan dana tidak ditemukan.');
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
