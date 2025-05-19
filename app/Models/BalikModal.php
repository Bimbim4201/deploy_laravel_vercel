<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalikModal extends Model
{
    use HasFactory;

    protected $table = 'balik_modal';

    protected $fillable = ['biaya_tetap', 'biaya_per_unit', 'harga_jual', 'hasil_input'];

}