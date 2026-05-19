<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('userId'); // 👈 ESTE ES EL CAMBIO IMPORTANTE
            $table->string('email')->unique();
            $table->string('userName');
            $table->string('password');
            $table->string('role');
            $table->string('profileIcon')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
