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
        Schema::create('voedingstype', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->foreignId('voedingsrichtlijnid')->nullable(false);
            $table->string('icon')->nullable(false);

            $table->foreign('voedingsrichtlijnid')
               ->references('id')
               ->on('voedingsrichtlijnen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voedingstype');
    }
};
