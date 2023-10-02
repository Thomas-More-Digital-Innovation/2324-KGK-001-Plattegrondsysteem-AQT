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
        Schema::create('protocoldetail', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('type')->nullable(false);
            $table->foreignId('dierid')->nullable(false);
            $table->foreignId('diersoortid')->nullable(false);
            $table->binary('file')->nullable(false);
            $table->string('icon')->nullable(false);

            $table->foreign('dierid')
               ->references('id')
               ->on('dier');

            $table->foreign('diersoortid')
               ->references('id')
               ->on('diersoort');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('protocoldetail');
    }
};
