<?php

namespace App\Http\Controllers;

use App\Models\ProyekPenggalangan;
use Illuminate\Http\Request;

class ProyekPenggalanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.proyek_penggalangan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function status_aktif()
    {

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
