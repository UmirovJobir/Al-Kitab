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
        Schema::create('author_infos', function (Blueprint $table) {
            $table->id();
            $table->uuid('author_id');
            $table->string('language', 5);
            $table->string('name', 255);
            $table->text('info');
            $table->timestamps();

            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
                ->onDelete('cascade');

            $table->index('author_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('author_infos');
    }
};
