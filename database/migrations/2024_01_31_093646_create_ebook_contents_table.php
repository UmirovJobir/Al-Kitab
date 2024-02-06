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
        Schema::create('ebook_contents', function (Blueprint $table) {
            $table->id();
            $table->uuid('ebook_id');
            $table->string('title', 255);
            $table->text('content');
            $table->integer('page');
            $table->timestamps();

            $table->foreign('ebook_id')
                ->references('id')
                ->on('ebooks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ebook_contents');
    }
};
