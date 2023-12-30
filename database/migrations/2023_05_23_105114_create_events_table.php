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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_title', 100);
            $table->text('description');
            $table->string('category');
            $table->string('capacity');
            $table->date('event_date');
            $table->time('event_time');
            $table->string('venue');
            $table->string('ticket_price');
            $table->string('image')->nullable();

            $table->unsignedBigInteger('organizer_id');
            $table->foreign('organizer_id')
            ->references('id')
            ->on('organizers')
            ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
