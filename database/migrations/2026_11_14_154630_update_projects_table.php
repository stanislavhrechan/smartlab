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
            if (!Schema::hasColumn('projects', 'type')) {
                $table->enum('type', ['opportunity', 'informational'])->default('opportunity');
            }

            if (!Schema::hasColumn('projects', 'reward_type')) {
                $table->enum('reward_type', ['none', 'fixed', 'negotiable'])->default('none');
            }

            if (!Schema::hasColumn('projects', 'reward_amount')) {
                $table->decimal('reward_amount', 10, 2)->nullable();
            }

            if (!Schema::hasColumn('projects', 'reward_currency')) {
                $table->string('reward_currency', 3)->default('EUR');
            }

            if (!Schema::hasColumn('projects', 'accepts_applications')) {
                $table->boolean('accepts_applications')->default(false);
            }

            if (!Schema::hasColumn('projects', 'short_description')) {
                $table->string('short_description', 500)->nullable();
            }

            if (!Schema::hasColumn('projects', 'full_description')) {
                $table->longText('full_description')->nullable();
            }

            if (!Schema::hasColumn('projects', 'goals')) {
                $table->longText('goals')->nullable();
            }

            if (!Schema::hasColumn('projects', 'requirements_analysis')) {
                $table->longText('requirements_analysis')->nullable();
            }

            if (!Schema::hasColumn('projects', 'solution_design')) {
                $table->longText('solution_design')->nullable();
            }

            if (!Schema::hasColumn('projects', 'data_collection_evaluation')) {
                $table->longText('data_collection_evaluation')->nullable();
            }

            if (!Schema::hasColumn('projects', 'outputs')) {
                $table->longText('outputs')->nullable();
            }

            if (!Schema::hasColumn('projects', 'published_at')) {
                $table->timestamp('published_at')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $columns = [
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
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('projects', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
