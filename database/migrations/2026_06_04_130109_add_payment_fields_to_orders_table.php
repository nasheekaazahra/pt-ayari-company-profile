<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('orders', function (Blueprint $table) {

        $table->integer('dp')->default(0);

        $table->integer('remaining_payment')->default(0);

        $table->string('payment_status')->default('Unpaid');

    });
}


    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'price',
                'dp',
                'remaining_payment',
                'payment_status'
            ]);

        });
    }
};