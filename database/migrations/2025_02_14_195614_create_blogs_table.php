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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Заголовок блогу
            $table->text('content'); // Контент блогу
            $table->string('image')->nullable(); // Зображення (опціонально)
            $table->unsignedBigInteger('user_id'); // ID автора
            $table->timestamps();

            // Зв'язок із таблицею користувачів
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
