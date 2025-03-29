<?php

namespace App\Http\Controllers;

use App\Models\PemohonPenggalangan;
use Illuminate\Http\Request;

class PemohonPenggalanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pemohon_penggalangan.index');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PemohonPenggalangan $pemohonPenggalangan)
    {
        //
    }
}
