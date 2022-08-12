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
        Schema::create('countries', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->bigInteger('ext_id')->nullable()->unsigned()->index();
                $table->boolean('active')->default(0);
                $table->string('code', 2);
                $table->string('code_3', 3);
                $table->string('code_num');
                $table->string('call_prefix');

                $table->json('name');

                $table->json('params');

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
        Schema::dropIfExists('countries');
    }
};
