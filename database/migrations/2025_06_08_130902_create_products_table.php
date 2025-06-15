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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('cpu');
            $table->string('gpu');
            $table->integer('ram');
            $table->integer('floor');
            $table->integer('price');
            $table->enum('room', ['public', 'private'])->default('public');
            $table->enum('status', ['available','online', 'offline', 'maintenance', 'prepare', 'undifined'])->default('maintenance');
            $table->timestamp('book_start')->nullable();
            $table->timestamp('book_end')->nullable();
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('image4');
            $table->text('desc');
            $table->integer('rent')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
