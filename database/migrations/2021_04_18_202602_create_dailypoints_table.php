<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailypointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailypoints', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamp('date')->useCurrent();
            $table->points('points');
            $table->unsignedBigInteger('dailypoint_id');
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
        Schema::dropIfExists('dailypoints');
    }
}
