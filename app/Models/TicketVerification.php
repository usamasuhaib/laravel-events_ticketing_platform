<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketVerification extends Model
{
    protected $fillable = ['ticket_id', 'verified_at'];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class, 'ticket_id', 'ticket_id');
    }
}
