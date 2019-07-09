<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function(Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->string('rank_hy');
            $table->string('rank_en');
            $table->string('rank_ru');
            $table->string('name_hy');
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('description_hy');
            $table->string('description_en');
            $table->string('description_ru');
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
        Schema::drop('teams');
    }
}
