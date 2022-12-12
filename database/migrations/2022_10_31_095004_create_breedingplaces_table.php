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
        Schema::create('breedingplaces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('id_breeding')->references('id')->on('breeding');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->integer('animals');
            $table->date('added');
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
        Schema::dropIfExists('breedingplaces');
    }
};
