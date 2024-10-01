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

        Schema::create('questions', function (Blueprint $table) {
            $table->increments('questionID');
            $table->unsignedInteger('surveyID');
            $table->foreign('surveyID')->references('surveyID')->on('surveys')->onDelete('cascade');
            $table->unsignedInteger('position');
            $table->text('prompt', 2000);
            $table->enum('type', ["text","country","radio_button","checkbox"]);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
