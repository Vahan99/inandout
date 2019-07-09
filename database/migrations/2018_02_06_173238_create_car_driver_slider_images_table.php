<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarDriverSliderImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_driver_slider_images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('car_driver_id')->unsigned();
            $table->timestamps();

            $table->foreign('car_driver_id')->references('id')->on('car_driver')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_driver_slider_images');
    }
}
