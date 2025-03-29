<?php

namespace App\Http\Controllers;

use App\Models\PenarikanDana;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
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
