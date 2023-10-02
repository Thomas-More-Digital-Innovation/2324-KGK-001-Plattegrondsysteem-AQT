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
        Schema::create('dier', function (Blueprint $table) {
            $table->id();
            $table->foreignId('werkplekid')->nullable(false);
            $table->foreignId('diersoortid')->nullable(false);
            $table->boolean('quarantaine')->nullable(false);
            $table->foreignId('inventarisid')->nullable(false);

            $table->foreign('werkplekid')
               ->references('id')
               ->on('werkplek');

            $table->foreign('diersoortid')
               ->references('id')
               ->on('diersoort');

            $table->foreign('inventarisid')
               ->references('id')
               ->on('inventaris');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dier');
    }
};
