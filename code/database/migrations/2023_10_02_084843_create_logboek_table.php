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
        Schema::create('logboek', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userid')->nullable(false);
            $table->foreignId('werkplekid')->nullable(false);
            $table->longText('description')->nullable(false);
            $table->dateTime('datetime')->nullable(false);
            $table->string('jaar')->nullable(false);

            $table->foreign('userid')
               ->references('id')
               ->on('user');

            $table->foreign('werkplekid')
               ->references('id')
               ->on('werkplek');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logboek');
    }
};
