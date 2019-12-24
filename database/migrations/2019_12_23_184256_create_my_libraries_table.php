<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyLibrariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('my_libraries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('my_voca_name');
            $table->string('my_voca_slug');
            $table->string('my_voca_mean');
            $table->string('my_voca_spell');
            $table->string('my_voca_type');
            $table->string('my_voca_example_en');
            $table->string('my_voca_example_vi');
            $table->string('my_voca_image');
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
        Schema::dropIfExists('my_libraries');
    }
}
