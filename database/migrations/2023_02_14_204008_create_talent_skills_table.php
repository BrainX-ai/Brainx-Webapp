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
        Schema::create('talent_skills', function (Blueprint $table) {

            $table->unsignedBigInteger('talent_id');
            $table->unsignedBigInteger('skill_id');
            $table->unsignedSmallInteger('years')->nullable();
            $table->timestamps();

            $table->primary(['talent_id', 'skill_id']);
            $table->foreign('talent_id')->references('talent_id')->on('talents');
            $table->foreign('skill_id')->references('skill_id')->on('skills');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talent_skills');
    }
};
