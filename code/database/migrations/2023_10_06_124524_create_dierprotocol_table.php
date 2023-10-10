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
        Schema::create('dierprotocol', function (Blueprint $table) {
            $table->foreignId('protocoldetailid')->nullable(false);
            $table->foreignId('diersoortid')->nullable(false);
            $table->primary(['protocoldetailid','diersoortid']);

            $table->foreign('protocoldetailid')
            ->references('id')
            ->on('protocoldetail');

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
        Schema::dropIfExists('dierprotocol');
    }
};
