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
        Schema::create('translated_countries', function (Blueprint $table) {
            $table->id();
            $table->string('translated_name');
            $table->string('language');
            $table->unsignedBigInteger('country_id')->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('ext_id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('translated_names');
    }
};
