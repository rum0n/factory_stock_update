<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSrRoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sr_roads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sr_id');
            $table->unsignedBigInteger('road_id');
            $table->foreign('sr_id')->references('id')->on('srs')->onDelete('cascade');
            $table->foreign('road_id')->references('id')->on('roads')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sr_roads');
    }
}
