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
        Schema::create('new_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('cover_image');
            $table->date('release_date');
            $table->enum('type', ['single', 'album', 'ep']);
            $table->string('spotify_link')->nullable();
            $table->string('apple_music_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
            // Contrainte pour s'assurer qu'il n'y a qu'une seule entrée
            $table->boolean('singleton')->default(true)->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_projects');
    }
};
