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
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id('id_barangKeluar');
            $table->dateTime('tanggal_barangKeluar');
            $table->string('keperluan')->nullable();
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('id_permintaan')->index()->nullable();
            $table->timestamps();
            $table->foreign('id_permintaan')->references('id_permintaan')->on('permintaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluar');
    }
};
