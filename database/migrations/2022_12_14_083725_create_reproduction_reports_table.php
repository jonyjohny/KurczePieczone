<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reproduction_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reproductionrowcage_id')->references('id')->on('reproductionrowcages');
            $table->foreignId('reproductionrow_id')->references('id')->on('reproductionrows');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->integer('nicHens')->nullable();
            $table->integer('nicRoosters')->nullable();
            $table->integer('cannibalismHens')->nullable();
            $table->integer('cannibalismRoosters')->nullable();
            $table->integer('debilityHens')->nullable();
            $table->integer('debilityRoosters')->nullable();
            $table->integer('otherHens')->nullable();
            $table->integer('otherRoosters')->nullable();
            $table->longText('fallsRemarks')->nullable();
            $table->integer('goodEggs')->nullable();
            $table->integer('badEggs')->nullable();
            $table->integer('exportEggs')->nullable();
            $table->longText('prevention')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reproduction_reports');
    }
};
