<?php

namespace App\Models;
use Laravel\Cashier\Billable;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Attendee extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard='attendee';
    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',

    ];

        // Example of the Attendee model relationship definition

        public function eventsInCart()
        {
            return $this->belongsToMany(Event::class, 'my_cart'); // Use your actual pivot table name
        }
        // Attendee.php

    public function my_cart()
    {
        return $this->belongsToMany(Event::class, 'my_cart'); // Replace 'cart' with your actual pivot table name
    }



        public function tickets()
        {
            return $this->hasMany(Ticket::class);
        }



        public function soldTickets()
        {
            return $this->hasMany(SoldTicket::class, 'attendee_id');
        }

        public function organizersThroughSoldTickets()
        {
            return $this->hasManyThrough(Organizer::class, SoldTicket::class, 'attendee_id', 'id', 'id', 'organizer_id');
        }
        // In the Attendee model
        public function event()
        {
            return $this->belongsTo(Event::class);
        }
        
        
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
        protected $hidden = [
            'password',
            'remember_token',
        ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

