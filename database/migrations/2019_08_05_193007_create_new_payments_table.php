<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     * Payment done only in 2 ways either by cash or via Electronic Funds Transfer (e.g MPESA, PayPal)
     * Receipt no recorded for EFT types otherwise can accept null for cash payments
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id');
            $table->enum('payment_type',['Cash','EFT']);
            $table->string("receipt_no")->nullable();
            $table->double('amount');
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
        Schema::dropIfExists('payments');
    }
}
