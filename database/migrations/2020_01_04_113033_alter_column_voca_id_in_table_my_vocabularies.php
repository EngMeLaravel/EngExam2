<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnVocaIdInTableMyVocabularies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('my_vocabularies', function (Blueprint $table) {
            $table->integer('voca_id')->default(0)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('my_vocabularies', function (Blueprint $table) {
            $table->integer('voca_id')->default(0)->index();
        });
    }
}
