<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLanguageToIdeas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ideas', function (Blueprint $table) {
            $table->unsignedBigInteger('language_id');

            $table->foreign('language_id')->references('id')->on('languages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ideas', function (Blueprint $table) {
            $table->dropForeign(['language_id']);

            $table->dropColumn('language_id');
        });
    }
}
