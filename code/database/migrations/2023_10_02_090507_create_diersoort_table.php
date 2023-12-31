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
        Schema::create('diersoort', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('latinname')->nullable(false);
            $table->string('foto')->nullable(false);
            $table->string('file')->nullable(true);
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diersoort');
    }
};
