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

        Schema::create('authors_books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('authors_id');
            $table->unsignedBigInteger('books_id');

            $table->foreign('authors_id')->references('id')->on('authors');
            $table->foreign('books_id')->references('id')->on('books');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('authors_books');
    }
};
