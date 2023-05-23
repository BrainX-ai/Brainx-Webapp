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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('contract_name')->nullable();
            $table->string('description')->nullable();
            $table->string('contract_type')->nullable();
            $table->double('fixed_price')->nullable();
            $table->double('service_fee')->nullable();
            $table->double('talent_receive')->nullable();
            $table->unsignedBigInteger('job_id');
            $table->timestamps();


            $table->foreign('job_id')->references('job_id')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
    }
};
