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
        Schema::table('questions', function (Blueprint $table) {
            
            $table->text('question')->nullable()->change();
            $table->text('option1')->nullable()->change();
            $table->text('option2')->nullable()->change();
            $table->text('option3')->nullable()->change();
            $table->text('option4')->nullable()->change();
            $table->text('answer')->nullable()->change();
            $table->text('note')->nullable()->change();
            $table->text('explanation')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            //
        });
    }
};
