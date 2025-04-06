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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_users');
            $table->unsignedBigInteger('id_level')->index();
            $table->unsignedBigInteger('id_sa')->index();
            $table->unsignedBigInteger('id_fungsi')->index();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id_level')->references('id_level')->on('level');
            $table->foreign('id_sa')->references('id_sa')->on('sales_area');
            $table->foreign('id_fungsi')->references('id_fungsi')->on('fungsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
