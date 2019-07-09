<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_hy');
            $table->string('name_ru');
            $table->string('name_en');
            $table->string('slug');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('tour_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::table('tour_types', function(Blueprint $table) {
            $table->dropForeign('tour_types_parent_id_foreign');
        });
        Schema::dropIfExists('tour_types');
    }
}
