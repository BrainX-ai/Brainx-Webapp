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
        Schema::table('jobs', function (Blueprint $table) {
            $table->string('job_type');
            $table->integer('duration_in_weeks')->nullable();
            $table->integer('hours_per_week')->nullable();
            $table->integer('hourly_rate_from')->nullable();
            $table->integer('hourly_rate_to')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jobs', function (Blueprint $table) {
            
            $table->string('job_type');
            $table->integer('duration_in_weeks')->nullable();
            $table->integer('hours_per_week')->nullable();
            $table->integer('hourly_rate_from')->nullable();
            $table->integer('hourly_rate_to')->nullable();
        });
    }
};
