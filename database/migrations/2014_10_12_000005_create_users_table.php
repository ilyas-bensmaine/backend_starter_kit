<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('arabic_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable()->unique();
            $table->string('user_invitation_code',6)->nullable()->unique();
            $table->string('invitation_code',6)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('language')->default('fr');
            $table->string('skin')->default('light');
            $table->boolean('completed_informations')->default(false);
            $table->boolean('is_first_login')->default(true);
            $table->foreignId('user_status_id')->default(1)->constrained();    // active statue
            $table->foreignId('wilaya_id')->default(1)->constrained();
            $table->foreignId('user_profession_id')->nullable()->default(1)->constrained();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
