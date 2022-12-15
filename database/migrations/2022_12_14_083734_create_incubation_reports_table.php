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
        Schema::create('incubation_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('incubationincubator_id')->references('id')->on('incubationincubators');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->float('impregnation', 8, 2)->nullable();
            $table->date('eggTest')->nullable();
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
        Schema::dropIfExists('incubation_reports');
    }
};
