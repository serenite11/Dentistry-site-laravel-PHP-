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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('group_name');
            $table->string('permission');
        });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('login')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('tel')->unique() ;
            $table->string('date');
            $table->string('city');
            $table->string('pic');
            $table->boolean('spam');
            $table->string('status')->default('unban');
            $table->foreignId('group_id')->default('4');
            $table->foreign('group_id')->references('id')->on('permissions');
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
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('users');
    }
};
