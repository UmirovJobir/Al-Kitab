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
        Schema::create('abook_audio', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->uuid('abook_id');
            $table->string('name', 255);
            $table->text('description');
            $table->boolean('is_free')->default(false);
            $table->string('host', 255)->notNull();
            $table->string('filename', 255)->notNull();
            $table->integer('duration');
            $table->integer('order' )->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('abook_id')
                ->references('id')
                ->on('abooks')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abook_audio');
    }
};
