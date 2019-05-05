<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttractionInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attraction_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('attraction_id')->unsigned();
            $table->bigInteger('language_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->foreign('attraction_id')->references('id')->on('attractions')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attraction_infos');
    }
}
