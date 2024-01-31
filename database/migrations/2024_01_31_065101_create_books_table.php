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
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->integer('pid');
            $table->uuid('publisher_id');
            $table->string('language', 5);
            $table->string('name', 255);
            $table->text('description');
            $table->boolean('is_available')->default(true);
            $table->decimal('rating', 1, 1)->default(0);
            $table->timestamps();

            $table->index('pid');
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
