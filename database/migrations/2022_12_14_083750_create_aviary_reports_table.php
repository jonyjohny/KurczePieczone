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
        Schema::create('aviary_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aviaryplace_id')->references('id')->on('aviaryplaces');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->longText('feeding')->nullable();
            $table->longText('cure')->nullable();
            $table->integer('hensExport')->nullable();
            $table->integer('roostersExport')->nullable();
            $table->longText('destination')->nullable();
            $table->integer('hensFalls')->nullable();
            $table->integer('roostersFalls')->nullable();
            $table->longText('remarksFalls')->nullable();
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
        Schema::dropIfExists('aviary_reports');
    }
};
