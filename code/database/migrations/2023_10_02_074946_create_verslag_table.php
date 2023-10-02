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
        Schema::create('verslag', function (Blueprint $table) {
            $table->id();
            $table->binary('file')->nullable(false);
            $table->foreignId('userid')->nullable(false);

            $table->foreign('userid')
               ->references('id')
               ->on('role');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verslag');
    }
};
