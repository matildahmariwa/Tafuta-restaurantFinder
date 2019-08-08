<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('visit_type', ['Solo','Business', 'Couples', 'Family', 'Friends'])->nullable(true);
            $table->string('title', 255);
            $table->tinyInteger('rating');
            $table->text('review')->nullable(true);
            $table->timestamps();
            $table->softDeletes();

            //Add relation to restaurants table (1 restaurant can have many reviews)
            $table->foreign('restaurant_id')
                ->references('id')
                ->on('restaurants');

            //Add relation to users table (1 user can add many reviews)
            $table->foreign('user_id')
                ->references('id')
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
        Schema::dropIfExists('reviews');
    }
}
