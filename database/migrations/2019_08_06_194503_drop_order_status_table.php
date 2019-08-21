<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropOrderStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('order_status');
        Schema::dropIfExists('cover_image');


        //Update orders with columns from order_status
        Schema::table('orders', function (Blueprint $table) {
            $table->enum('status', ['Received', 'Waiting', 'Served', 'Cancelled']);
            $table->integer('duration'); //Time that will be taken to serve the request
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Do nothing for now
    }
}
