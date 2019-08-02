<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeResidenceColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bed_types', function (Blueprint $table) {
            $table->string('name_hy')->nullable()->change();
            $table->string('name_en')->nullable()->change();
            $table->string('name_ru')->nullable()->change();
        });

        Schema::table('room_types', function (Blueprint $table) {
            $table->string('name_hy')->nullable()->change();
            $table->string('name_en')->nullable()->change();
            $table->string('name_ru')->nullable()->change();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('BedType', function (Blueprint $table) {
            //
        });
    }
}
