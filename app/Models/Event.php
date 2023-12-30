<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Event extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Define the primary key property
    protected $guard = 'organizer';

    protected $fillable = [
        'event_title',
        'description',
        'capacity', // Remove one of the 'capacity' entries if it's duplicated
        'ticket_price',
        'event_date',
        'image',
    ];


    public function organizer()
    {
        return $this->belongsTo(Organizer::class);
    }

  

        public function soldTickets()
        {
            return $this->hasMany(SoldTicket::class);
        }

    public function tickets()
        {
            return $this->hasMany(Ticket::class);
        }

        public function getTicketsSoldAttribute()
        {
            return $this->tickets()->where('status', 'Confirmed')->count();
        }


    public function calculateRevenue()
        {
            // Calculate the total revenue for the event based on ticket prices
            return $this->tickets->sum('price');
        }

    public function ticketsSold()
    {
        // Retrieve the number of tickets sold for the event
        return $this->tickets->count();
    }


    public function attendees()
    {
        return $this->hasMany(Attendee::class);
    }
}
