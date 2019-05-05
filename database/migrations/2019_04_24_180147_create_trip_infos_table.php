<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trip_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('language_id')->unsigned();
            $table->bigInteger('trip_id')->unsigned();
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip_infos');
    }
}
