<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidenceRoomTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residence_room_types', function (Blueprint $table) {
            $table-> increments('id');
            $table-> unsignedInteger('residence_id');
            $table->foreign('residence_id')->references('id')->on('residences')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table-> unsignedInteger('room_type_id');
            $table->foreign('room_type_id')->references('id')->on('room_types')
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
        Schema::dropIfExists('residence_room_types');
    }
}
