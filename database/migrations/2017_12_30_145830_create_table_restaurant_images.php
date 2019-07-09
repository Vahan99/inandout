<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRestaurantImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('restaurant_id')->unsigned();
            $table->string('image');
            $table->boolean('is_main');
            $table->timestamps();

            $table->foreign('restaurant_id')->references('id')
                ->on('restaurants')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {                  
        Schema::table('restaurant_images', function(Blueprint $table) {
            $table->dropForeign('restaurant_images_restaurant_id_foreign');
        });

        Schema::dropIfExists('restaurant_images');
    }
}
