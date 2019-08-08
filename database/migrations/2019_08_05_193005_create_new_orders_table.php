<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewOrdersTable extends Migration
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
            $table->unsignedBigInteger('menu_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('quantity')->default(1);
            $table->timestamps();
            $table->softDeletes();

            //Add relation to menu table
            $table->foreign('menu_id')
                ->references('id')
                ->on('menu');

            //Add relation to users table (1 user can make many orders) -- If user is deleted cascade
            $table->foreign('user_id')
                ->references('id')
                ->onDelete('CASCADE')
                ->on('users');
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
        Schema::dropIfExists('orders');
    }
}
