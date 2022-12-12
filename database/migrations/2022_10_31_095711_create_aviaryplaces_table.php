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
        Schema::create('aviaryplaces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('id_aviary')->references('id')->on('aviaries');
            $table->foreignId('id_user')->references('id')->on('users');
            $table->longText('remarks')->nullable();
            $table->integer('animals');
            $table->integer('hens')->nullable();
            $table->integer('roosters')->nullable();
            $table->integer('age')->nullable();
            $table->date('added');
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
        Schema::dropIfExists('aviaryplaces');
    }
};
