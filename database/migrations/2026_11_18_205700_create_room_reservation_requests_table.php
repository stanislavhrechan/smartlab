<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('room_reservation_requests', function (Blueprint $table) {
            $table->id();
            $table->string('room_key', 60);
            $table->string('room_name', 160);
            $table->string('name', 120);
            $table->string('email');
            $table->string('phone', 40)->nullable();
            $table->string('organization', 160)->nullable();
            $table->unsignedSmallInteger('attendees');
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->text('purpose')->nullable();
            $table->string('status', 20)->default('pending');
            $table->timestamps();

            $table->index(['room_key', 'starts_at', 'ends_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('room_reservation_requests');
    }
};
