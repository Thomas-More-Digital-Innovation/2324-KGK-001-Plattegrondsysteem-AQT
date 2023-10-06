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
            $table->foreignId('protocoldetailid')->nullable(false);
            $table->datetime('datetime')->nullable(false);
            $table->boolean('checked');
            $table->double('temperatuur');
            $table->double('gewicht');

            $table->foreign('protocoldetailid')
               ->references('id')
               ->on('protocoldetail');
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
