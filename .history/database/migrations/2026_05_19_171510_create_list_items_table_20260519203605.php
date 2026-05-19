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
        Schema::create('list_items', function (Blueprint $table) {
            $table->unsignedBigInteger('listId');
            $table->unsignedBigInteger('contentId');

            $table->foreign('listId')->references('listId')->on('lists')->onDelete('cascade');
            $table->foreign('contentId')->references('contentId')->on('contents')->onDelete('cascade');

            $table->primary(['listId', 'contentId']);
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_items');
    }
};
