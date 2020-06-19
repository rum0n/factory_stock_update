<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDsrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dsrs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employee_id');
            $table->integer('target');
            $table->string('target_date');
            $table->integer('achieved');
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
        Schema::dropIfExists('dsrs');
    }
}
