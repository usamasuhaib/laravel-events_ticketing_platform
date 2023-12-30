<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'ticket_id',
        'attendee_id',
        'status',

        'organizer_id', // Make sure 'organizer_id' is included here

        'price',
        // Add more ticket attributes here as needed
    ];
        public function soldTickets()
    {
        return $this->hasMany(SoldTicket::class);
    }
        public function attendee()
    {
        return $this->belongsTo(Attendee::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

// Ticket.php

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function organizer()
    {
        return $this->belongsTo(Organizer::class, 'organizer_id');
    }


    // You can define any additional relationships or methods related to tickets here
}
