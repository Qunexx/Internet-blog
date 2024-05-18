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
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('birthday')->nullable();
            $table->string('quote')->charset('utf8mb4')->nullable();
            $table->string('bio')->charset('utf8mb4')->nullable();
            $table->string('vk')->charset('utf8mb4')->nullable();
            $table->string('telegram')->charset('utf8mb4')->nullable();
            $table->string('github')->charset('utf8mb4')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
