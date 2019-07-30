<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResBedTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('res_bed_types', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('residence_id');
            $table->foreign('residence_id')->references('id')->on('residences')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedInteger('bed_type_id');
            $table->foreign('bed_type_id')->references('id')->on('bed_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('res_bed_types');
    }
}
