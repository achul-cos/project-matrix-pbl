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
            $table->foreignId('user_id')->nullable()->constrained(table: 'users')->onDelete('cascade')->nullOnDelete(); // //foreign key table users (id);
            $table->string('user_username')->nullable();
            $table->integer('qty_bill')->nullable();
            $table->string('payment_method')->nullable();
            $table->timestamp('payment_start')->nullable();
            $table->timestamp('payment_end')->nullable();
            $table->text('note')->nullable();
            $table->string('payment_photo')->nullable();
            $table->timestamps();
            $table->integer('token_amount')->nullable(); // jumlah token yang akan diberikan
            $table->string('checkout_link')->nullable();
            $table->string('external_id')->nullable();
            $table->string('invoice_id')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('paid_at')->nullable();
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
