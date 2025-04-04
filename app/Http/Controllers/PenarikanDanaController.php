<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenarikanDana;
use App\Models\ProyekPenggalangan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePenarikanDanaRequest;

class PenarikanDanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.penarikan_dana.index');
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
    public function store(StorePenarikanDanaRequest $request, ProyekPenggalangan $proyekPenggalangan)
    {
        // dd($proyekPenggalangan);
        $sudahPenarikanDana = $proyekPenggalangan->penarikanDana()->exists();

        if ($sudahPenarikanDana) {
            return redirect()->route('admin.proyek_penggalangan.show', $proyekPenggalangan);
        }
 
        DB::transaction(function () use ($request, $proyekPenggalangan) {
            $validated = $request->validated();
            $validated['proyek_penggalangan_id'] = $proyekPenggalangan->id;
            $validated['pemohon_penggalangan_id'] = Auth::user()->pemohonPenggalangan->id;
            $validated['sudah_diterima'] = false;
            $validated['sudah_disetujui'] = false;
            $validated['jumlah_diminta'] = $proyekPenggalangan->TotalDonasiTerkumpul();
            $validated['jumlah_diterima'] = 0;
            $validated['bukti_pembayaran'] = 'buktipembayaran/buktitransferpalsu.png';

            $proyekPenggalangan->penarikanDana()->create($validated);
        });


        return redirect()->route('admin.laporan_penggalangan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PenarikanDana $penarikanDana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenarikanDana $penarikanDana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenarikanDana $penarikanDana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenarikanDana $penarikanDana)
    {
        //
    }
}
