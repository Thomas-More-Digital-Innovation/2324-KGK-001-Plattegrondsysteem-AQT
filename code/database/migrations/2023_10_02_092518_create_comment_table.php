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
            $table->boolean('leerkracht')->nullable(false);
            $table->foreignId('dierid')->nullable(false);
            $table->string('comment')->nullable(false);

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
