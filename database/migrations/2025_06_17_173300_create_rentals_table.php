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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained();
            $table->timestamp('booked_start')->nullable();
            $table->timestamp('booked_end')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->enum('status', ['pending', 'active', 'completed', 'cancelled'])->default('pending');
            $table->integer('duration'); // Durasi dalam jam
            $table->integer('total_price'); // Total harga sewa
            $table->timestamp('actual_end')->nullable(); // Waktu selesai sebenarnya
            $table->text('notes')->nullable(); // Catatan tambahan
            $table->string('activation_code', 6)->unique()->nullable(); // Kode unik 6 digit
            $table->enum('activation_status', ['pending', 'activated'])->default('pending');
            $table->timestamp('activated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
