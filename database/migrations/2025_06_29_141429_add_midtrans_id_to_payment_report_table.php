<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('payment_report', function (Blueprint $table) {
            $table->string('midtrans_id')->nullable()->after('user_username');
        });
    }

    public function down()
    {
        Schema::table('payment_report', function (Blueprint $table) {
            $table->dropColumn('midtrans_id');
        });
    }
};
