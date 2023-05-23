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
        Schema::create('talents', function (Blueprint $table) {
            $table->id('talent_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name')->nullable();
            $table->text('profile_info')->nullable();
            $table->string('country')->nullable();
            $table->string('standout_job_title')->nullable();
            $table->integer('experience')->nullable();
            $table->text('brief_summary')->nullable();
            $table->decimal('hourly_rate', 8, 2)->nullable();
            $table->integer('hours_per_week')->nullable();
            $table->text('interested_types_of_project')->nullable();
            $table->text('why_on_brainx')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('website')->nullable();
            $table->string('photo')->nullable();
            $table->string('resumePath')->nullable();
            $table->text('resumeData')->nullable();
            $table->string('status')->default('INCOMPLETE');

            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talents');
    }
};
