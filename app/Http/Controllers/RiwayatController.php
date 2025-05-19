<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Riwayat;
use App\Models\LabaMaksimum;
use App\Models\BalikModal; // jangan lupa import ini

class RiwayatController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'biaya' => 'required|numeric|min:1',
        'hargaJual' => 'required|numeric|min:1',
        'laba' => 'required|numeric|min:1',
        'jumlahBarang' => 'required|numeric|min:1',
    ]);

    Riwayat::create([
        'biaya' => $request->biaya,
        'harga_jual' => $request->hargaJual,
        'laba' => $request->laba,
        'jumlah_barang' => $request->jumlahBarang,
    ]);
    
    return redirect('/Riwayat')->with('success', 'Data berhasil disimpan');
    
}

    

    public function index()
    {
        // Ambil data riwayat target laba
        $Riwayat = Riwayat::latest()->get();

        // Ambil data riwayat laba maksimum
        $LabaMaksimum = LabaMaksimum::latest()->get();

        // Ambil data riwayat balik modal
        $BalikModal = BalikModal::latest()->get();

        // Kirim ke view
        return view('riwayat', compact('Riwayat', 'LabaMaksimum', 'BalikModal'));
    }
}
