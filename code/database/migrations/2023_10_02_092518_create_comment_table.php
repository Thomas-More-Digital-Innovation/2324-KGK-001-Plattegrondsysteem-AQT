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
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userid')->nullable(false);
            $table->foreignId('dierid')->nullable(false);
            $table->foreignId('comment')->nullable(false);

            $table->foreign('userid')
               ->references('id')
               ->on('werkplek');

            $table->foreign('dierid')
               ->references('id')
               ->on('diersoort');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
