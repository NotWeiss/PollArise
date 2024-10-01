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

        Schema::create('choices', function (Blueprint $table) {
            $table->increments('choiceID');
            $table->unsignedInteger('questionID');
            $table->foreign('questionID')->references('questionID')->on('questions')->onDelete('cascade');
            $table->string('text', 64);
            $table->boolean('is_other')->default(0);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choices');
    }
};
