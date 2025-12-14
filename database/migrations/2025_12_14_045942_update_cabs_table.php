<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Step 1: Add columns (slug nullable initially)
        Schema::table('cabs', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('vehicle_type');
            $table->decimal('regular_fare', 8, 2)->nullable()->before('fare');
            $table->longText('description')->nullable()->after('fare');

            // SEO
            $table->string('seo_title')->nullable()->after('description');
            $table->string('seo_keywords')->nullable()->after('seo_title');
            $table->text('seo_description')->nullable()->after('seo_keywords');
        });

        // Step 2: Generate unique slugs for existing records
        $cabs = DB::table('cabs')->select('id', 'vehicle_type')->get();

        foreach ($cabs as $cab) {
            $baseSlug = Str::slug($cab->vehicle_type);
            $slug = $baseSlug;
            $count = 1;

            // Ensure uniqueness
            while (
                DB::table('cabs')->where('slug', $slug)->exists()
            ) {
                $slug = $baseSlug . '-' . $count++;
            }

            DB::table('cabs')
                ->where('id', $cab->id)
                ->update(['slug' => $slug]);
        }

        // Step 3: Make slug unique & not nullable
        Schema::table('cabs', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable(false)->change();
        });
    }

    public function down(): void
    {
        Schema::table('cabs', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->dropColumn([
                'slug',
                'regular_fare',
                'description',
                'seo_title',
                'seo_keywords',
                'seo_description',
            ]);
        });
    }
};
