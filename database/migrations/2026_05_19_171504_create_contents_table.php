<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->id('contentId');
            $table->string('title');
            $table->integer('releaseYear');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('type');
            $table->unsignedBigInteger('emotionId');
            $table->timestamps();

            $table->foreign('emotionId')->references('emotionId')->on('emotions')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
