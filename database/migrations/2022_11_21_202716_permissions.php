<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {/*
        Schema::create('permissions', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('group_id');
            $table->string('permission');
            $table->foreign('group_id')->references('id')->on('groups');
        });*/
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
};
