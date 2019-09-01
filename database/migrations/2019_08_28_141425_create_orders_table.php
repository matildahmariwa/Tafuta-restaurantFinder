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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('food');
            $table->integer('quantity');
            $table->integer('price');
            $table->string('delivery_address');
            $table->string('city');
            $table->integer('phone_number');
            $table->unsignedInteger('user_id');
            $table->integer('restaurant_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        
            


        
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
