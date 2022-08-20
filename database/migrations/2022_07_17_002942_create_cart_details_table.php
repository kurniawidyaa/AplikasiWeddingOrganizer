<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id');
            $table->foreignId('cart_id');
            $table->bigInteger('cart_detail_qty')->default(0);
            $table->bigInteger('cart_detail_price')->default(0);
            $table->bigInteger('cart_detail_discount')->default(0);
            $table->bigInteger('cart_detail_subtotal')->default(0);
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
        Schema::dropIfExists('cart_details');
    }
}
