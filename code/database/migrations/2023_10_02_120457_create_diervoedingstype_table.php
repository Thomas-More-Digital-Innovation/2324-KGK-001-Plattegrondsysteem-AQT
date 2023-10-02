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
        Schema::create('diervoedingstype', function (Blueprint $table) {
            $table->foreignId('voedingstypeid');
            $table->foreignId('dierid');
            $table->primary(['voedingstypeid', 'dierid']);

            $table->foreign('voedingstypeid')
               ->references('id')
               ->on('voedingstype');

            $table->foreign('dierid')
               ->references('id')
               ->on('dier');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diervoedingstype');
    }
};
