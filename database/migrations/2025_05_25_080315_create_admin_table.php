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
        Schema::create('admin', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('name'); // Kolom untuk nama admin
            $table->string('username')->unique(); // Kolom untuk username, harus unik
            $table->string('password'); // Kolom untuk password admin
            $table->string('role'); // Kolom untuk role admin (misalnya: super admin, operator)
            $table->string('photo')->nullable();
            $table->timestamp('last_online')->nullable(); // Kolom untuk waktu terakhir online, nullable
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
