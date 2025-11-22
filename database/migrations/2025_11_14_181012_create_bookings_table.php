<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('schedule_id')->constrained()->onDelete('cascade');
            $table->string('passenger_name');
            $table->integer('seat_number');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->unique(['schedule_id', 'seat_number']); // prevent double booking
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
