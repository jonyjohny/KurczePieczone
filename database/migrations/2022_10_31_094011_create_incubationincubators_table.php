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
        Schema::create('incubationincubators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('id_incubation')->references('id')->on('incubations');
            $table->foreignId('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('incubationincubators');
    }
};