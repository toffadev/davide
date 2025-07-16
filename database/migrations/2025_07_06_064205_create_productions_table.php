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
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['payant', 'gratuit']);
            $table->string('audio_sample_path')->nullable(); // pour extrait mp3 si payant
            $table->string('youtube_link')->nullable(); // pour lien si gratuit
            $table->decimal('price', 8, 2)->nullable(); // prix si payant
            $table->string('cover_image')->nullable(); // image/visuel de la prod
            $table->boolean('is_visible')->default(true); // publication
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
