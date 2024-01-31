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
        Schema::create('book_data', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('isbn', 32);
            $table->integer('edition')->default(1);
            $table->integer('edition_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_data');
    }
};
