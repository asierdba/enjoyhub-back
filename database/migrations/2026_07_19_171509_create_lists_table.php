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
        Schema::create('lists', function (Blueprint $table) {
            $table->id('listId');
            $table->string('listName');
            $table->text('listDescription')->nullable();
            $table->timestamp('createdAt')->useCurrent();
            $table->unsignedBigInteger('userId');

            $table->foreign('userId')
                ->references('userId')
                ->on('users')
                ->onDelete('cascade');
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lists');
    }
};
