<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTour extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table){
            $table->increments('id');
            $table->string('name_hy');
            $table->string('name_en');
            $table->string('name_ru');
            $table->text('desc_hy');
            $table->text('desc_en');
            $table->text('desc_ru');
            $table->integer('region_id')->unsigned();
            $table->timestamps();

            $table->foreign('region_id')->references('id')
                ->on('regions')
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
        Schema::table('tours', function (Blueprint $table) {
            $table->dropForeign('tours_region_id_foreign'); 
        });

        Schema::dropIfExists('tours');
    }
}