<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//Migracja encji zamówień
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
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name');
            $table->string('surname');
            $table->bigInteger('age');
            $table->string('email');
            $table->string('phoneNumber');
            $table->string('street');
            $table->string('buildingFlatNumber');
            $table->string('country');
            $table->string('voivodeship');
            $table->string('postcode');
            $table->string('city');
            $table->string('deliveryMethod');
            $table->string('paymentMethod');
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
