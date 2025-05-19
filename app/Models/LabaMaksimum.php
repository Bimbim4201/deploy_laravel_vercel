<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabaMaksimum extends Model
{
    use HasFactory;

    protected $table = 'laba_maksimums';
    protected $fillable = [
        'biaya_tetap',
        'biaya_variabel',
        'harga_awal',
        'penurunan_harga',
        'hasil_input',
    ];
}