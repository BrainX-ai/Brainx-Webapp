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
        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string('action_type');
            $table->unsignedBigInteger('sender_id')->nullable();
            $table->unsignedBigInteger('job_id');
            $table->timestamps();

            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreign('job_id')->references('job_id')->on('jobs');
        });
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('action_id');
            $table->unsignedBigInteger('sender_id')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();


            $table->foreign('action_id')->references('id')->on('actions');
            $table->foreign('sender_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
