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
        Schema::create('customize_tour_enquiries', function (Blueprint $table) {
            $table->id();
            // Personal Information
            $table->string('name');
            $table->string('email');
            $table->string('contact_no');

            // Trip Details
            $table->string('destinations')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('travelers')->nullable();

            // Budget & Preferences
            $table->string('budget')->nullable();        // e.g. "<1000", "1000-2000"
            $table->json('interests')->nullable();        // as array
            $table->string('accommodation')->nullable();  // budget/mid/luxury etc
            $table->string('pace')->nullable();           // relaxed/moderate/etc

            // Additional Notes
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customize_tour_enquiries');
    }
};
