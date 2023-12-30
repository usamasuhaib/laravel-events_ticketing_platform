<?php

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoldTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'event_id',
        'attendee_id',
        'organizer_id',
        'sale_date',
        'ticket_price',
        // Add other attributes here
    ];

    // Define relationships
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function attendee()
    {
        return $this->belongsTo(Attendee::class);
    }

    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }
}
