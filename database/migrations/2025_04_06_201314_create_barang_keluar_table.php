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
            $table->id('id_barang_keluar');
            $table->unsignedBigInteger('id_fungsi')->index();
            $table->unsignedBigInteger('id_sa')->index();
            $table->dateTime('tanggal_barang_keluar');
            $table->string('keperluan')->nullable();
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('id_permintaan')->index()->nullable();
            $table->timestamps();
            $table->foreign('id_fungsi')->references('id_fungsi')->on('fungsi');
            $table->foreign('id_sa')->references('id_sa')->on('sales_area');
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
