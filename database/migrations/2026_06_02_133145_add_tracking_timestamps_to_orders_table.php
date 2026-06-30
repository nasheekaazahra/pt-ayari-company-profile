<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->timestamp('received_at')->nullable();
            $table->timestamp('design_at')->nullable();
            $table->timestamp('production_at')->nullable();
            $table->timestamp('qc_at')->nullable();
            $table->timestamp('shipping_at')->nullable();
            $table->timestamp('completed_at')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'received_at',
                'design_at',
                'production_at',
                'qc_at',
                'shipping_at',
                'completed_at'
            ]);

        });
    }
};