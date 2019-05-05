<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttractionsTripsPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attraction_trip', function (Blueprint $table) {
            $table->integer('index')->default(0);
            $table->bigInteger('attraction_id')->unsigned()->index();
            $table->foreign('attraction_id')->references('id')->on('attractions')->onDelete('cascade');
            $table->bigInteger('trip_id')->unsigned()->index();
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->primary(['attraction_id', 'trip_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attraction_trip');
    }
}
