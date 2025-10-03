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
        Schema::create('warnet_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_open')->default(true); // true = buka, false = tutup
            $table->json('available_computers')->nullable(); // ID komputer yg tersedia
            $table->text('close_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warnet_settings');
    }
};
