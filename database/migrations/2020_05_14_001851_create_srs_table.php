<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('srs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('employee_id');
            $table->integer('product_id');
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
        Schema::dropIfExists('srs');
    }
}
