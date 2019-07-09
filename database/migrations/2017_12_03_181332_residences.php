<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Residences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residences', function (Blueprint $table){
            $table->increments('id');
            $table->string('name_hy');
            $table->string('name_en');
            $table->string('name_ru');
            $table->text('desc_hy');
            $table->text('desc_en');
            $table->text('desc_ru');
            $table->integer('residence_type');
            $table->string('address_hy')->nullable();
            $table->string('address_en')->nullable();
            $table->string('address_ru')->nullable();
            $table->text('amenities')->nullable();
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
        Schema::table('residences', function(Blueprint $table) {
            $table->dropForeign('residences_region_id_foreign');
        });
        Schema::dropIfExists('residences');
    }
}
