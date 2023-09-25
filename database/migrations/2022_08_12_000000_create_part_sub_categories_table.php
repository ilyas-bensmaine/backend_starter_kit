<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('arabic_name')->nullable();
            $table->string('description')->nullable();
            $table->string('arabic_description')->nullable();
            $table->string('color_tag')->nullable();
            $table->foreignId('part_category_id');
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
        Schema::dropIfExists('part_sub_categories');
    }
}
