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
        Schema::create('userwerkplek', function (Blueprint $table) {
            $table->foreignId('userid')->nullable(false);
            $table->foreignId('werkplekid')->nullable(false);
            $table->dateTime('datetime')->nullable(false);
            $table->primary(['userid', 'werkplekid']);

            $table->foreign('userid')
               ->references('id')
               ->on('users');

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
        Schema::dropIfExists('userwerkplek');
    }
};
