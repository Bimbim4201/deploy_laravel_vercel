<?php

namespace App\Http\Controllers;

use App\Models\BalikModal;
use Illuminate\Http\Request;


class BalikModalController extends Controller
{
    public function store(Request $request)
{
     $request->validate([
    'biaya_tetap'    => 'required|numeric|min:1',
    'biaya_per_unit' => 'required|numeric|min:1',
    'harga_jual'     => 'required|numeric|min:1|gt:biaya_per_unit',
    'hasil_input'    => 'required|string',
]);
    BalikModal::create($request->all());

    return redirect('/Riwayat')->with('success', 'Hasil berhasil disimpan!');

}
}
