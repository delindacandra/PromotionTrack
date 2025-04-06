<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_barangMasuk', function (Blueprint $table) {
            $table->id('id_detailBarangMasuk');
            $table->unsignedBigInteger('id_barangMasuk')->index();
            $table->unsignedBigInteger('id_barang')->index();
            $table->integer('jumlah');
            $table->timestamps();
            $table->foreign('id_barangMasuk')->references('id_barangMasuk')->on('barang_masuk');
            $table->foreign('id_barang')->references('id_barang')->on('data_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_barangMasuk');
    }
};
