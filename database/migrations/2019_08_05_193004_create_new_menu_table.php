<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('category_id');
            $table->string('food_item');
            $table->double('price');
            $table->softDeletes();
            $table->timestamps();

            //Add relation to restaurants table; 1 restaurant many food items
            $table->foreign('restaurant_id')
                ->references('id')
                ->onDelete('CASCADE')
                ->onUpdate('CASCADE')
                ->on('restaurants');

            //Add relation to menu category table
            $table->foreign('category_id')
                ->references('id')
                ->on('menu_category');
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
        Schema::dropIfExists('menu');
    }
}
