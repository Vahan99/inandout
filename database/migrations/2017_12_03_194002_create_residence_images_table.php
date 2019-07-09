<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidenceImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residence_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('residence_id')->unsigned();
            $table->string('image');
            $table->boolean('is_main');
            $table->timestamps();

            $table->foreign('residence_id')->references('id')
                ->on('residences')
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
        Schema::table('residence_images', function(Blueprint $table) {
            $table->dropForeign('residence_images_residence_id_foreign');  
        });
        Schema::dropIfExists('residence_images');
    }
}
