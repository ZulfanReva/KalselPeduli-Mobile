<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonaturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donatur = Donatur::with(['proyekPenggalangan'])->orderByDesc('id')->paginate(5);

        return view('admin.donatur.index', compact('donatur'));
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
    public function show(Donatur $donatur)
    {
        //
        return view('admin.donatur.show', compact('donatur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donatur $donatur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donatur $donatur)
    {
        DB::transaction(function () use ($donatur) {
            $donatur->update([
                'sudah_dibayar' => true,
            ]);
        });

        return redirect()->route('admin.donatur.show', $donatur);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donatur $donatur)
    {
        //
    }
}
