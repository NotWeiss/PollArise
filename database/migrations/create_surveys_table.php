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

        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('surveyID');
            $table->string('userEmail');
            $table->foreign('userEmail')->references('email')->on('users')->onDelete('cascade');
            $table->string('title', 255);
            $table->text('description', 2000);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
