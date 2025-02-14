<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Назва фото
            $table->string('image'); // Шлях до файлу
            $table->string('category'); // Категорія
            $table->string('status')->default('pending'); // Статус фото (approved, rejected, pending)
            $table->unsignedBigInteger('user_id'); // ID користувача
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};

