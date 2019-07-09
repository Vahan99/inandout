<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnsMainImageFromDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tour_images', function (Blueprint $table) {
            $table->dropColumn('is_main');
        });
        Schema::table('residence_images', function (Blueprint $table) {
            $table->dropColumn('is_main');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tour_images', function (Blueprint $table) {
            $table->boolean('is_main')->default(0);
        });
        Schema::table('residence_images', function (Blueprint $table) {
            $table->boolean('is_main')->default(0);
        });
    }
}
