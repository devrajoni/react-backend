<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('phone')->unique();
            $table->string('image')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('verified')->default(false);
            $table->string('darkmode')->nullable()->default(0);
            $table->string('password');
            $table->string('status')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
