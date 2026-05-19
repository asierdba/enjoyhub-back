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
        Schema::create('books', function (Blueprint $table) {
            $table->unsignedBigInteger('contentId')->primary();
            $table->string('publisher')->nullable();
            $table->string('isbn')->nullable();
            $table->integer('pageCount')->nullable();

            $table->foreign('contentId')->references('contentId')->on('contents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
