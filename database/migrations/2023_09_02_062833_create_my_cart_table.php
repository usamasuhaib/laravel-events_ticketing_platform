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
        Schema::create('my_cart', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attendee_id');
            $table->unsignedBigInteger('event_id');
            $table->integer('quantity')->default('0'); // Number of tickets purchased
            // $table->decimal('total_price', 10, 2); // Total price for the tickets
            $table->timestamps();
            
              // Define foreign keys
              $table->foreign('attendee_id')->references('id')->on('attendees')->onDelete('cascade');
              $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_cart');
    }
};
