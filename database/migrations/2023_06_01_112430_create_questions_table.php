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

        Schema::create('assessment_cateories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question')->nullable();
            $table->string('option1')->nullable();
            $table->string('option2')->nullable();
            $table->string('option3')->nullable();
            $table->string('option4')->nullable();
            $table->string('answer')->nullable();
            $table->string('note')->nullable();
            $table->string('explanation')->nullable();
            $table->unsignedBigInteger('assessment_category_id');

            $table->timestamps();

            $table->foreign('assessment_category_id')->references('id')->on('assessment_cateories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
