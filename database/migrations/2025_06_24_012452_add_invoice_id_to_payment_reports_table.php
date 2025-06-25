<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('payment_report', function (Blueprint $table) {
            $table->string('invoice_id')->nullable();
        });

        Schema::table('payment_report', function (Blueprint $table) {
        $table->string('external_id')->nullable();
        });

    }

    public function down()
    {
        Schema::table('payment_report', function (Blueprint $table) {
            $table->dropColumn('invoice_id');
        });
    }
};
