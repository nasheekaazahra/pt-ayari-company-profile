<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->boolean('logo_alignment')->nullable();

            $table->boolean('color_accuracy')->nullable();

            $table->boolean('printing_quality')->nullable();

            $table->boolean('packaging_quality')->nullable();

            $table->string('qc_photo')->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {

            $table->dropColumn([
                'logo_alignment',
                'color_accuracy',
                'printing_quality',
                'packaging_quality',
                'qc_photo'
            ]);

        });
    }
};