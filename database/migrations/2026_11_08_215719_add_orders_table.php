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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('creator_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->foreignId('project_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('title');
            $table->text('description');

            $table->decimal('reward', 10, 2)->nullable();
            $table->date('deadline')->nullable();

            $table->string('status')->default('open');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
