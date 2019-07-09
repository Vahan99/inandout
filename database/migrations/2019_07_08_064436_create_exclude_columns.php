<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcludeColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->text('exclude_hy')->nullable()->after('after_text_en');
            $table->text('exclude_ru')->nullable()->after('exclude_hy');
            $table->text('exclude_en')->nullable()->after('exclude_ru');
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
            $table->dropColumn('exclude_hy');
            $table->dropColumn('exclude_ru');
            $table->dropColumn('exclude_en');
        });
    }
}
