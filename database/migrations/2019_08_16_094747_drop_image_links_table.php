<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropImageLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('image_links');
        //Update restaurant, menu and profile table with new image column
        Schema::table('restaurants', function (Blueprint $table) {
            $table->text('cover_image')->nullable(true);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->text('profile_image')->nullable(true);
        });
        Schema::table('menu', function (Blueprint $table) {
            $table->text('menu_image')->nullable(true);
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
