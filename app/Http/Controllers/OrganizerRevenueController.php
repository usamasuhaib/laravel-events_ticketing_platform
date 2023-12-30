<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Organizer;
use App\Models\Event;
use App\Models\Ticket;

class OrganizerRevenueController extends Controller
{
    public function index()
    {
        // Retrieve the logged-in organizer
        $organizer = auth()->guard('organizer')->user();
    
        // Retrieve all events organized by the organizer with the count of tickets sold
        $events = $organizer->events->map(function ($event) {
            $event->ticketsSold = $event->tickets->count();
            return $event;
        });
    
        return view('organizer.revenue.index', compact('events'));
    }
    

    public function show($eventId)
    {
        // Retrieve the logged-in organizer
        $organizer = auth()->guard('organizer')->user();
    
        // Retrieve the event by ID
        $event = Event::findOrFail($eventId);
    
        // Retrieve revenue and ticket information for the event
        $revenue = $event->calculateRevenue();
        $ticketsSold = $event->tickets()->count(); // Count the number of tickets sold for the event
    
        return view('organizer.revenue.show', compact('event', 'revenue', 'ticketsSold'));
    }
    
}
