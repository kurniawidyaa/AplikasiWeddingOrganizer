<?php

use App\Models\Service;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_category_id');
            $table->string('service_code');
            $table->string('service_name');
            $table->string('identifier');
            $table->string('service_thumbnail')->nullable();
            $table->text('service_describe');
            $table->text('service_note')->nullable();
            $table->bigInteger('service_qty')->default(0);
            $table->bigInteger('service_price')->default(0);
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
        Schema::dropIfExists('services');
    }
}
