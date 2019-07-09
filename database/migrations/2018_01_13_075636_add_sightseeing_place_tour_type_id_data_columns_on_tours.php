<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSightseeingPlaceTourTypeIdDataColumnsOnTours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->integer('sightseeing_place')->default(0);
            $table->integer('tour_type_id')->nullable()->unsigned();
            $table->text('data')->nullable();

            $table->foreign('tour_type_id')->references('id')->on('tour_types')
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
            $table->dropForeign('tours_tour_type_id_foreign'); 
            $table->dropColumn('sightseeing_place');
            $table->dropColumn('tour_type_id');
            $table->dropColumn('data');
        });
    }
}
