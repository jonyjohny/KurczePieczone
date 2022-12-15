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
        Schema::create('breeding_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('breedingplace_id')->references('id')->on('breedingplaces');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->integer('falls')->nullable();
            $table->integer('selection')->nullable();
            $table->float('mainTemperature', 8, 2)->nullable();
            $table->float('hallTemperature', 8, 2)->nullable();
            $table->float('humidity', 8, 2)->nullable();
            $table->longText('fodder')->nullable();
            $table->longText('water')->nullable();
            $table->longText('lighting')->nullable();
            $table->longText('lightingRemarks')->nullable();
            $table->longText('ventilation')->nullable();
            $table->longText('animalsTaken')->nullable();
            $table->longText('destination')->nullable();
            $table->longText('remarks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /*
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('breeding_reports');
    }
};
