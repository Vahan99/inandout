<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function(Blueprint $table) {
             $table->increments('id');
             $table->string('images');   
             $table->string('name_hy');   
             $table->string('name_en');   
             $table->string('name_ru');
             $table->text('text_hy');   
             $table->text('text_en');   
             $table->text('text_ru');   
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
        Schema::drop('pages');
    }
}
