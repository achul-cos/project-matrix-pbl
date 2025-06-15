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
        Schema::create('payment_report', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained(table: 'users')->onDelete('cascade')->nullOnDelete();// //foreign key table users (id);
            $table->string('user_username');
            $table->string('midtrans_id')->nullable();
            $table->integer('qty_bill');
            $table->string('payment_method');
            $table->enum('status', ['pending', 'success', 'failed']);
            $table->timestamp('payment_start');
            $table->timestamp('payment_end');
            $table->text('note')->nullable();
            $table->string('payment_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_report');
    }
};
