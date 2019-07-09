<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableTourImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tour_id')->unsigned();
            $table->string('image');
            $table->timestamps();

            $table->foreign('tour_id')->references('id')
                ->on('tours')
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
        Schema::table('tour_images', function(Blueprint $table) {
            $table->dropForeign('tour_images_tour_id_foreign');
        });

        Schema::dropIfExists('tour_images');
    }
}
