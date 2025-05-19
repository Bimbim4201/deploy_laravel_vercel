<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laba_maksimums', function (Blueprint $table) {
    $table->id();
    $table->integer('biaya_tetap');
    $table->integer('biaya_variabel');
    $table->integer('harga_awal');
    $table->integer('penurunan_harga');
    $table->text('hasil_input');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laba_maksimums');
    }
};
