<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
   protected $fillable = ['biaya', 'harga_jual', 'laba', 'jumlah_barang'];

}