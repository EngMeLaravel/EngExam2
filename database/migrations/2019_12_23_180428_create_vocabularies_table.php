<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVocabulariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocabularies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('voca_name');
            $table->string('voca_slug');
            $table->string('voca_author');
            $table->string('voca_mean');
            $table->string('voca_spell');
            $table->string('voca_type');
            $table->string('voca_example_en');
            $table->string('voca_example_vi');
            $table->string('voca_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vocabularies');
    }
}
