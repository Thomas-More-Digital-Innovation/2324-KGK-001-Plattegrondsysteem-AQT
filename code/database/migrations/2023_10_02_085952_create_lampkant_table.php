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
        Schema::create('lampkants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventarisid')->nullable(false);
            $table->foreignId('lampid')->nullable(false);
            $table->string('position')->nullable(false);

            $table->foreign('inventarisid')
               ->references('id')
               ->on('inventaris');

            $table->foreign('lampid')
               ->references('id')
               ->on('lamps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lampkants');
    }
};
