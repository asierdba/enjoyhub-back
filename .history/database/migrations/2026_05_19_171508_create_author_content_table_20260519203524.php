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
        Schema::create('authors_book', function (Blueprint $table) {
            $table->unsignedBigInteger('authorId');
            $table->unsignedBigInteger('contentId');

            $table->foreign('authorId')->references('authorId')->on('authors')->onDelete('cascade');
            $table->foreign('contentId')->references('contentId')->on('contents')->onDelete('cascade');

            $table->primary(['authorId', 'contentId']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author_content');
    }
};
