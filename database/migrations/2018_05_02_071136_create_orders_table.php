<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->date('order_date');
            $table->enum('payment_method', ['cod', 'cash', 'credit']);
            $table->unsignedInteger('served_by');
            $table->unsignedInteger('delivered_by')->nullable();

            $table->timestamps();
            $table->foreign('served_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('delivered_by')->references('id')->on('personnels')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
