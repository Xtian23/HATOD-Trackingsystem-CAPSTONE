<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverRouteLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driver_route_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('personnel_id');
            $table->unsignedInteger('order_id');
            $table->double('lat');
            $table->double('lng');
            $table->timestamps();
            $table->foreign('personnel_id')->references('id')->on('personnels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver_route_logs');
    }
}
