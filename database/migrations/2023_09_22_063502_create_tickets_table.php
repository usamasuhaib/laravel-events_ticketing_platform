<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id')->unique();
            

            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('organizer_id');
            $table->unsignedBigInteger('attendee_id');


            $table->decimal('price', 10, 2); // Ticket price
            // Add other ticket attributes here
            $table->string('status'); // Add a 'status' column


            $table->timestamps();

            // Define foreign key relationship with the "events" table
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('organizer_id')->references('id')->on('organizers')->onDelete('cascade');
            $table->foreign('attendee_id')->references('id')->on('attendees')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
