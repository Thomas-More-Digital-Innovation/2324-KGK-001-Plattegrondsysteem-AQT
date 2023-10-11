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
        Schema::create('checkitem', function (Blueprint $table) {
            $table->id();
            $table->foreignId('protocoldetailid')->nullable(true);
            $table->foreignId('dierid')->nullable(false);
            $table->datetime('datetime')->nullable(false);
            $table->boolean('checked')->nullable(true);
            $table->double('temperatuur')->nullable(true);
            $table->double('gewicht')->nullable(true);

            $table->foreign('protocoldetailid')
               ->references('id')
               ->on('protocoldetail');
            
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
        Schema::dropIfExists('checkitem');
    }
};
