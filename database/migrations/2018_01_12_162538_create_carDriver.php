<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarDriver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_driver', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_hy');
            $table->string('name_en');
            $table->string('name_ru');
            $table->text('desc_hy');
            $table->text('desc_en');    
            $table->text('desc_ru');
            $table->string('slug');
            $table->string('image');
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
        Schema::dropIfExists('car_driver');
    }
}
