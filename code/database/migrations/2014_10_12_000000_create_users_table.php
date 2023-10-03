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
      Schema::create('users', function (Blueprint $table) {
         $table->id();
         $table->string('firstname')->nullable(false);
         $table->string('lastname')->nullable(false);
         $table->string('username')->unique()->nullable(false);
         $table->string('email')->unique()->nullable(false);
         $table->string('password')->nullable(false);
         $table->foreignId('roleid')->default(1)->nullable(false);
         
         $table->foreign('roleid')
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
      Schema::dropIfExists('users');
   }
};
