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
        Schema::create('publisher_infos', function (Blueprint $table) {
            $table->id();
            $table->uuid('publisher_id');
            $table->string('language', 5);
            $table->string('name', 255);
            $table->text('info');
            $table->timestamps();

            $table->foreign('publisher_id')
                ->references('id')
                ->on('publishers')
                ->onDelete('cascade');

            $table->index('publisher_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publisher_infos');
    }
};
