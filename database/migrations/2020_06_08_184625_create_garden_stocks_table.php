<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGardenStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('garden_stocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('qty');
            $table->integer('used')->default(0);
            $table->integer('price');
            $table->string('expiry_date');
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
        Schema::dropIfExists('garden_stocks');
    }
}
