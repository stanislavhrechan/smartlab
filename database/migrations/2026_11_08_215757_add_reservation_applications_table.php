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
        Schema::create('reservation_applications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('partner_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->string('zone', 3);
            $table->string('location');

            $table->dateTime('starts_at');
            $table->dateTime('ends_at');

            $table->unsignedInteger('duration_hours');

            $table->text('message')->nullable();

            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('reservation_applications');
    }
};
