<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('physical_address');
            $table->time('opening_time');
            $table->time('closing_time');
            $table->string("days_of_operation");
            $table->string('website')->nullable(true);
            $table->string('email')->nullable(true);
            $table->string('phone')->nullable(true);
            $table->softDeletes();
            $table->timestamps();
            if($request->hasFile('cover_image')) {
                $restaurant->cover_image = ImageUploadController::store($request, 'cover_image');
            }
            $restaurant->save();
            return redirect("restaurants/");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
