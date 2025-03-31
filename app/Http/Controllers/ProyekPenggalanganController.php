<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProyekPenggalanganRequest;
use App\Models\Kategori;
use App\Models\PemohonPenggalangan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProyekPenggalangan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProyekPenggalanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        $proyekPenggalanganQuery = ProyekPenggalangan::with(['kategori', 'pemohonPenggalangan', 'donatur'])->orderByDesc('id');

        if ($user->hasRole('pemohon_penggalangan')) {
            $proyekPenggalanganQuery->whereHas('pemohonPenggalangan', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        }

        $proyekPenggalangan = $proyekPenggalanganQuery->paginate(10);

        return view('admin.proyek_penggalangan.index', compact('proyekPenggalangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategori = Kategori::all();
        return view('admin.proyek_penggalangan.create', ['item' => $kategori]);
    }

    public function status_aktif() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProyekPenggalanganRequest $request)
    {
        $pemohonPenggalangan = PemohonPenggalangan::where('user_id', Auth::user()->id)->first();

        DB::transaction(function () use ($request, $pemohonPenggalangan) {
            $validated = $request->validated();

            // Menangani file foto
            if ($request->hasFile('foto')) {
                $fotoPath = $request->file('foto')->store('fotos', 'public');
                $validated['foto'] = $fotoPath; // Simpan path foto
            } else {
                $fotoPath = 'images/foto-category-default.png'; // Default jika tidak ada foto
            }

            $validated['slug'] = Str::slug($validated['nama']); // Membuat slug dari nama proyek
            $validated['pemohon_penggalangan_id'] = $pemohonPenggalangan->id;
            $validated['status_aktif'] = false;
            $validated['sudah_selesai'] = false;

            // Membuat proyek penggalangan
            $proyekPenggalangan = ProyekPenggalangan::create($validated);

            // Hanya masukkan kategori berdasarkan input kategori_id
            if ($request->has('kategori_id')) {
                $kategoriId = $validated['kategori_id']; // Ambil kategori_id yang dipilih
                // Lakukan pengecekan jika kategori yang dipilih sudah ada di tabel kategori
                $kategori = Kategori::find($kategoriId);
            }
        });

        return redirect()->route('admin.proyek_penggalangan.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(ProyekPenggalangan $proyekPenggalangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProyekPenggalangan $proyekPenggalangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProyekPenggalangan $proyekPenggalangan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProyekPenggalangan $proyekPenggalangan)
    {
        //
    }
}
