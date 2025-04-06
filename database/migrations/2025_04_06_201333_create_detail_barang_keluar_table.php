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
        Schema::create('detail_barangKeluar', function (Blueprint $table) {
            $table->id('id_detailBarangKeluar');
            $table->unsignedBigInteger('id_barangKeluar')->index();
            $table->unsignedBigInteger('id_barang')->index();
            $table->integer('jumlah');
            $table->timestamps();
            $table->foreign('id_barangKeluar')->references('id_barangKeluar')->on('barang_keluar');
            $table->foreign('id_barang')->references('id_barang')->on('data_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_barangKeluar');
    }
};
