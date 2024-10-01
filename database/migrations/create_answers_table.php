<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('answers', function (Blueprint $table) {
            $table->increments('answerID');
            $table->unsignedInteger('responseID');
            $table->foreign('responseID')->references('responseID')->on('responses')->onDelete('cascade');
            $table->unsignedInteger('questionID');
            $table->foreign('questionID')->references('questionID')->on('questions')->onDelete('cascade');
            $table->unsignedInteger('choiceID')->nullable();
            $table->foreign('choiceID')->references('choiceID')->on('choices')->onDelete('cascade');
            $table->unsignedInteger('countryID')->nullable();
            $table->text('answer', 2000)->nullable();

            $table->index('countryID');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
