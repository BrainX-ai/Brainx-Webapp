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
        Schema::table('transactions', function (Blueprint $table) {
            
            $table->unsignedBigInteger('talent_id')->nullable()->change();
            $table->decimal('transaction_amount', 8, 2)->nullable()->change();
            $table->date('transaction_date')->nullable()->change();
            $table->unsignedBigInteger('milestone_id')->nullable();
            $table->string('status')->nullable()->default('INVOICE_REQUESTED');

            $table->foreign('milestone_id')->references('id')->on('milestones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
};
