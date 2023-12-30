<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('sold_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('attendee_id');
            $table->unsignedBigInteger('organizer_id');
            $table->timestamp('sale_date');
            $table->decimal('ticket_price', 10, 2);
            // Add any additional attributes as needed

            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('attendee_id')->references('id')->on('attendees');
            $table->foreign('organizer_id')->references('id')->on('organizers');

            $table->timestamps();

        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sold_tickets');
    }
};
