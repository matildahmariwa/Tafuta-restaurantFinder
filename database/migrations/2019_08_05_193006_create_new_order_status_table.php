<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewOrderStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->enum('status', ['Received', 'Waiting', 'Served', 'Cancelled']);
            $table->integer('duration'); //Time that will be taken to serve the request
            $table->softDeletes();
            $table->timestamps();

            //Add relation to orders table; relationship is one-to-one
            $table->foreign('order_id')
                ->references('id')
                ->onDelete('CASCADE')
                ->on('orders');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_status');
    }
}
