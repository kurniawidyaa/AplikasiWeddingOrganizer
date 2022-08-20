<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_promos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id');
            $table->foreignId('user_id');
            $table->decimal('starting_price', 16, 2)->default(0);
            $table->decimal('final_price', 16, 2)->default(0);
            $table->integer('percent_discount')->default(0);
            $table->decimal('nominal_discount', 16, 2)->default(0);
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
        Schema::dropIfExists('service_promos');
    }
}
