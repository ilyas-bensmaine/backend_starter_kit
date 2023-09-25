<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->boolean('asap')->default(false);
            $table->bigInteger('price')->nullable();
            $table->integer('quantity')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('wilaya_id')->nullable()->constrained();
            $table->foreignId('post_type_id')->nullable()->constrained();
            $table->foreignId('post_status_id')->nullable()->constrained();
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
        Schema::dropIfExists('posts');
    }
}
