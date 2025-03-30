<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PemohonPenggalangan;
use Illuminate\Support\Facades\Auth;

class PemohonPenggalanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Ambil daftar pemohon penggalangan untuk role 'owner'
        $pemohonPenggalangans = PemohonPenggalangan::orderByDesc('id')->get();

        // Inisialisasi variabel status
        $StatusPemohonPenggalangan = null;

        // Cek apakah user memiliki pemohon penggalangan
        if ($user->pemohonPenggalangan()->exists()) {
            $isPemohonActive = $user->pemohonPenggalangan->status_aktif;
            $StatusPemohonPenggalangan = $isPemohonActive ? 'AKTIF' : 'MENUNGGU';
        }

        // Kirim data ke view
        return view('admin.pemohon_penggalangan.index', compact('pemohonPenggalangans', 'StatusPemohonPenggalangan'));
    }

    public function daftar()
    {
        $user = Auth::user();

        // Validasi: Pastikan user belum terdaftar sebagai pemohon penggalangan
        if ($user->pemohonPenggalangan()->exists()) {
            return redirect()->route('admin.pemohon_penggalangan.index')
                ->with('error', 'Anda sudah terdaftar sebagai pemohon penggalangan.');
        }

        try {
            DB::transaction(function () use ($user) {
                $validated['user_id'] = $user->id;
                $validated['status_aktif'] = false; // Status awal: MENUNGGU

                PemohonPenggalangan::create($validated);
            });

            return redirect()->route('admin.pemohon_penggalangan.index')
                ->with('success', 'Pengajuan berhasil, menunggu persetujuan.');
        } catch (\Exception $e) {
            return redirect()->route('admin.pemohon_penggalangan.index')
                ->with('error', 'Terjadi kesalahan saat mendaftar: ' . $e->getMessage());
        }
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
    public function show(PemohonPenggalangan $pemohonPenggalangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PemohonPenggalangan $pemohonPenggalangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PemohonPenggalangan $pemohonPenggalangan)
    {
        $user = $pemohonPenggalangan->user;

        DB::transaction(function () use ($pemohonPenggalangan, $user) {

            $pemohonPenggalangan->update([
                'status_aktif' => true
            ]);

            if (!$user->hasRole('pemohon_penggalangan')) {
                $user->assignRole('pemohon_penggalangan');
            }
        });

        return redirect()->route('admin.pemohon_penggalangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemohonPenggalangan $pemohonPenggalangan)
    {
        //
    }
}
