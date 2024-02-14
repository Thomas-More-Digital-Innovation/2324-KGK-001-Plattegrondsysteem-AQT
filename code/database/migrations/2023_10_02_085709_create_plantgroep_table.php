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
        Schema::create('plantgroeps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventarisid')->nullable(true);
            $table->foreignId('plantid')->nullable(false);

            $table->foreign('inventarisid')
            ->references('id')
            ->on('inventaris');

            $table->foreign('plantid')
                ->references('id')
                ->on('plants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plantgroeps');
    }
};
