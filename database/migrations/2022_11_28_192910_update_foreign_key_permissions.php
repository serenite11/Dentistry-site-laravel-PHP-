<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        /*Schema::table('permissions', function (Blueprint $table) {
            $table->dropForeign(['group']);

            $table->foreign('group')->references('perm')->on('users')->onDelete('cascade');
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::dropIfExists('permissions');*/
    }
};
