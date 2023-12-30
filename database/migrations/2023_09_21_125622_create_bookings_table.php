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
      
            Schema::create('bookings', function (Blueprint $table) {
                $table->id();
                $table->dateTime('booking_date');
                $table->decimal('total_price', 10, 2);
                $table->string('status');
                $table->string('payment_status');
                $table->unsignedBigInteger('attendee_id');
                $table->unsignedBigInteger('event_id');
                $table->timestamps();
    
                // Define foreign key constraints
                $table->foreign('attendee_id')->references('id')->on('attendees');
                $table->foreign('event_id')->references('id')->on('events');
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
