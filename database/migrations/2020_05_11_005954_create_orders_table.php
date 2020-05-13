<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->integer('customer_id');
            $table->string('orderID');
            $table->string('pickup_address');
            $table->string('delivery_address');
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->string('distance');
            $table->string('weight');
            $table->string('item');
            $table->integer('quantity');
            $table->integer('riderID')->nullable();
            $table->enum('status',['pending','transit','delivered'])->default('pending');
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
        Schema::dropIfExists('orders');
    }
}
