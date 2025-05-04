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
        Schema::table('data_barang', function (Blueprint $table) {
            $table->dropColumn('vendor');

            $table->unsignedBigInteger('id_vendor')->nullable()->after('nama_barang');
            $table->foreign('id_vendor')->references('id_vendor')->on('vendor')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_barang', function (Blueprint $table) {
            $table->dropForeign(['id_vendor']);
            $table->dropColumn('id_vendor');

            $table->string('vendor')->nullable()->after('nama_barang');
        });
    }
};
