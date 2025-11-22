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
        Schema::table('cab_services', function (Blueprint $table) {
            $table->string('seo_title')->nullable()->after('note');
            $table->string('seo_keywords')->nullable()->after('seo_title');
            $table->text('seo_description')->nullable()->after('seo_keywords');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cab_services', function (Blueprint $table) {
            //
        });
    }
};
