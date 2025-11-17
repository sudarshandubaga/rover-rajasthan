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
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // like 'jaipur', 'udaipur', etc.
            $table->string('name');
            $table->string('type')->nullable(); // e.g. sightseeing, day-tour
            $table->longText('description')->nullable();
            $table->string('image_url')->nullable();
            $table->string('price')->nullable();
            $table->string('duration')->nullable();
            $table->text('long_description')->nullable();
            $table->json('gallery')->nullable();
            $table->json('inclusions')->nullable();
            $table->json('exclusions')->nullable();
            $table->json('itinerary')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->text('seo_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_packages');
    }
};
