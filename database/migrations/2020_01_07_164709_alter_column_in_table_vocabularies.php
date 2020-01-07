<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnInTableVocabularies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vocabularies', function (Blueprint $table) {
            $table->string('voca_name');
            $table->string('voca_slug');
            $table->string('voca_author')->default('admin')->change();
            $table->string('voca_mean');
            $table->string('voca_spell');
            $table->string('voca_type_noun');
            $table->string('voca_type_verb');
            $table->string('voca_type_adjective');
            $table->string('voca_type_');
            $table->string('voca_0example_en');
            $table->string('voca_example_vi');
            $table->string('voca_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vocabularies', function (Blueprint $table) {
            $table->dropColumn('cate_active');
        });
    }
}
