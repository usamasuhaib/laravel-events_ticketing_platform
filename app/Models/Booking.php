<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_date',
        'number_of_tickets',
        'total_price',
        'status',
        'payment_status',
        'attendee_id',
        'event_id',
    ];

    // Define relationships

    public function attendee()
    {
        return $this->belongsTo(Attendee::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
