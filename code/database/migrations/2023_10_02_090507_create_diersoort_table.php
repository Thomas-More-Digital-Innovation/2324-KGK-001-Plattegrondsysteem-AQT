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
            $table->double('mingroote')->nullable(false);
            $table->double('maxgroote')->nullable(false);
            $table->string('herkomst')->nullable(false);
            $table->double('mintemp')->nullable(false);
            $table->double('maxtemp')->nullable(false);
            $table->double('minluchtvochtigheid')->nullable(false);
            $table->double('maxluchtvochtigheid')->nullable(false);
            $table->string('bijzonderheden');
            $table->binary('foto');
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
