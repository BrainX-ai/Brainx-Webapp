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
        // Schema::table('jobs', function (Blueprint $table) {
        //     $table->dropColumn(['talent_id']);
        // });
        // Schema::table('jobs', function (Blueprint $table) {
        //     // $table->dropForeign(['talent_id']);
        //     $table->unsignedBigInteger('talent_id');
        //     $table->foreign('talent_id')->references('id')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            //
        });
    }
};
