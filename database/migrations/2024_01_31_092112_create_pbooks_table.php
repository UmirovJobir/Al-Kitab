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
        Schema::create('pbooks', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->boolean('is_free')->default(false);
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->integer('pages');
            $table->string('cover_type', 32);
            $table->string('format', 32);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pbooks');
    }
};
