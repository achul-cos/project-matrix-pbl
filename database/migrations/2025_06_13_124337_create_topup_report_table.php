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
        Schema::create('topup_report', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade')->nullOnDelete();
            $table->foreignId('payment_id')->nullable()->constrained('payment_report')->onDelete('cascade')->nullOnDelete(); //foreign key table payment_report (id)
            $table->integer('qty_token');
            $table->integer('qty_bill')->nullable();
            $table->enum('topup_method', ['online','offline']);
            $table->enum('payment_method', ['cash','transfer', 'coupon']);
            $table->text('note')->nullable();
            $table->timestamp('paid_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topup_report');
    }
};
