<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_responses', function (Blueprint $table) {
            $table->id();
            $table->text('content')->nullable();
            $table->bigInteger('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('garantie_unit')->nullable();
            $table->integer('garantie_temps')->nullable();
            $table->integer('garantie_type')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('wilaya_id')->constrained();
            $table->foreignId('post_id')->constrained();
            $table->foreignId('post_response_status_id')->constrained();
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
        Schema::dropIfExists('post_responses');
    }
}
