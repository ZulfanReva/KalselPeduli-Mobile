<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreKategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all(); // atau bisa pakai paginate()
        return view('admin.kategori.index', ['item' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKategoriRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('ikon')) {
                $ikonPath = $request->file('ikon')->store('ikons', 'public');
                $validated['ikon'] = $ikonPath; // Contoh path: /storage/ikons/filename.png
            } else {
                $ikonPath = 'images/ikon-category-default.png';
            }

            $validated['slug'] = Str::slug($validated['nama']); // Contoh slug: bencana-alam

            $kategori = Kategori::create($validated);
        });

        return redirect()->route('admin.kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
        return view('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        DB::beginTransaction();

        try {
            $kategori->delete();
            DB::commit();
            return redirect()->route('admin.kategori.index')->with('success', 'Kategori berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.kategori.index')->with('error', 'Terjadi kesalahan, kategori gagal dihapus.');
        }
    }
}
