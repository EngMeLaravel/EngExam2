<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnMyCategoryIdInTableMySubCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('my_sub_categories', function (Blueprint $table) {
            $table->integer('my_category_id')->default(0)->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('my_sub_categories', function (Blueprint $table) {
            $table->dropColumn('my_category_id');
        });
    }
}
