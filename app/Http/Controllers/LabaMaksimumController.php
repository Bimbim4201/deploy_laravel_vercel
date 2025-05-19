<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\LabaMaksimum;

class LabaMaksimumController extends Controller
{
    // Simpan data hasil hitung
    public function store(Request $request)
{
    // Hitung laba maksimal ulang di backend supaya akurat dan mudah diquery
    $bt = $request->biaya_tetap;
    $bv = $request->biaya_variabel;
    $ha = $request->harga_awal;
    $ph = $request->penurunan_harga;

    // Rumus laba maksimum sesuai kode JS-mu:
    $produksiOptimal = ($ha - $bv) / (2 * $ph);
    $hargaOptimal = $ha - $ph * $produksiOptimal;
    $laba = ($hargaOptimal * $produksiOptimal) - ($bt + $bv * $produksiOptimal);

    LabaMaksimum::create([
        'biaya_tetap' => $bt,
        'biaya_variabel' => $bv,
        'harga_awal' => $ha,
        'penurunan_harga' => $ph,
        'hasil_input' => $request->hasil_input,
        'laba' => $laba,
    ]);

    return redirect('/Riwayat')->with('success', 'Data berhasil disimpan!');
}

    // Tampilkan halaman riwayat sekaligus laba maksimum
    public function index()
    {
        $riwayat = LabaMaksimum::all();

        // Cari laba maksimum dari kolom hasil_input (atau kalau di db kamu ada kolom laba terpisah, gunakan itu)
        // Misal hasil_input berisi string, kamu perlu ekstrak dulu nilai laba
        // Tapi kalau kamu punya kolom 'laba' angka di db, pakai yang ini:
        $labaMaksimum = LabaMaksimum::max('laba'); 

        // Kalau belum ada kolom laba, kamu bisa hitung dari hasil_input jika formatnya terstruktur,
        // tapi lebih baik simpan laba sebagai kolom terpisah saat store

        return view('riwayat', ['Riwayat' => $riwayat, 'LabaMaksimum' => $labaMaksimum]);
    }
}
