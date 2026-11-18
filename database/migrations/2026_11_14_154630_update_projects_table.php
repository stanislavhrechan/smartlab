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
        Schema::table('projects', function (Blueprint $table) {
            $table->enum('type', [
                'opportunity',
                'informational'
            ])->default('opportunity');

            $table->enum('reward_type', [
                'none',
                'fixed',
                'negotiable'
            ])->default('none');

            $table->decimal('reward_amount', 10, 2)->nullable();

            $table->string('reward_currency', 3)->default('EUR');

            $table->boolean('accepts_applications')->default(false);

            $table->string('short_description', 500)->nullable();

            $table->longText('full_description')->nullable();

            $table->longText('goals')->nullable();

            $table->longText('requirements_analysis')->nullable();

            $table->longText('solution_design')->nullable();

            $table->longText('data_collection_evaluation')->nullable();

            $table->longText('outputs')->nullable();

            $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn([
                'type',
                'reward_type',
                'reward_amount',
                'reward_currency',
                'accepts_applications',
                'short_description',
                'full_description',
                'goals',
                'requirements_analysis',
                'solution_design',
                'data_collection_evaluation',
                'outputs',
                'published_at',
            ]);
        });
    }
};
