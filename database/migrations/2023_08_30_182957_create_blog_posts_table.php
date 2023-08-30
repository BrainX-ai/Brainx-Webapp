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
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // $table->string('slug')->unique()->after('title');
            $table->text('content');
            $table->string('author')->nullable();
            $table->string('status')->default('UNPUBLISHED');
            // Assuming you have a users table for authors
            $table->timestamps();

            // Define foreign key relationship
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
