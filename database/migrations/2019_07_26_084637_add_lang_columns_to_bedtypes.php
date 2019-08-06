<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLangColumnsToBedtypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bed_types', function (Blueprint $table) {
            $table->string('name_hy')->after('id');
            $table->string('name_en')->after('name_hy');
            $table->string('name_ru')->after('name_en');
            $table->dropColumn('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bed_types', function (Blueprint $table) {
            $table->dropColumn('name_hy');
            $table->dropColumn('name_en');
            $table->dropColumn('name_ru');
        });
    }
}
