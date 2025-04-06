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
        Schema::create('permintaan', function (Blueprint $table) {
            $table->id('id_permintaan');
            $table->unsignedBigInteger('id_users')->index();
            $table->unsignedBigInteger('id_skala')->index();
            $table->dateTime('tanggal_diperlukan');
            $table->integer('jumlah');
            $table->string('keperluan');
            $table->string('keterangan')->nullable();
            $table->string('dokumen')->nullable();
            $table->timestamps();
            $table->foreign('id_users')->references('id_users')->on('users');
            $table->foreign('id_skala')->references('id_skala')->on('skala_kegiatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan');
    }
};
