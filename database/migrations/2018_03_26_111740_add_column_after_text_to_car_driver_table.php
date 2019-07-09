<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAfterTextToCarDriverTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('car_driver', function (Blueprint $table) {
            $table->text('after_text_hy')->nullable();
            $table->text('after_text_ru')->nullable();
            $table->text('after_text_en')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('car_driver', function (Blueprint $table) {
            $table->dropColumn('after_text_en');
            $table->dropColumn('after_text_ru');
            $table->dropColumn('after_text_hy');
        });
    }
}
