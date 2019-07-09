<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnAfterTextToResidencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('residences', function (Blueprint $table) {
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
        Schema::table('residences', function (Blueprint $table) {
            $table->dropColumn('after_text_hy');
            $table->dropColumn('after_text_ru');
            $table->dropColumn('after_text_en');
        });
    }
}
