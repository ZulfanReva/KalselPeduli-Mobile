<?php

namespace App\Http\Controllers;

use App\Models\Donatur;
use App\Models\Kategori;
use Illuminate\Http\Request;
use App\Models\PenarikanDana;
use App\Models\ProyekPenggalangan;
use App\Models\LaporanPenggalangan;
use App\Models\PemohonPenggalangan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $proyekPenggalanganQuery = ProyekPenggalangan::query();
        $penarikanDanaQuery = PenarikanDana::query();

        if ($user->hasRole('pemohon_penggalangan')) {
            $pemohonPenggalanganId = $user->pemohonPenggalangan->id;

            $proyekPenggalanganQuery->where('pemohon_penggalangan_id', $pemohonPenggalanganId);
            $penarikanDanaQuery->where('pemohon_penggalangan_id', $pemohonPenggalanganId);

            $proyekPenggalanganIds = $proyekPenggalanganQuery->pluck('id');

            $donatur = Donatur::whereIn('proyek_penggalangan_id', $proyekPenggalanganIds)
                ->where('sudah_dibayar', true)
                ->count();
        } else {
            $donatur = Donatur::where('sudah_dibayar', true)
                ->count();
        }

        $proyekPenggalangan = $proyekPenggalanganQuery->count();
        $penarikanDana = $penarikanDanaQuery->count();
        $kategori = Kategori::count();
        $pemohonPenggalangan = PemohonPenggalangan::count();

        return view('dashboard', compact('donatur', 'proyekPenggalangan', 'kategori', 'penarikanDana', 'pemohonPenggalangan'));
    }
}
