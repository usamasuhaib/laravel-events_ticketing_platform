<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\pendingOrganizer;
use App\Models\Organizer;
use App\Models\Attendee;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    // Admin Dashboard 

    public function dashboard()
{
    if (auth()->guard('admin')->check()) {
        $approvedOrganizersCount = Organizer::count();
        $attendeesCount = Attendee::count();
        // compact('organizers', 'pendingOrganizersCount')
        return view('admin.dashboard', compact('approvedOrganizersCount','attendeesCount'));
    }
    
    // Redirect to the login page or show an error message
    return redirect()->route('admin.login');
}


    // public function dashboard(){
    //     return view('admin.dashboard');    
    // }



  

    public function organizersList()
    {
        if (auth()->guard('admin')->check()) {
            $organizers = Organizer::all();
            $pendingOrganizersCount = pendingOrganizer::count(); // Count the pending organizers
            return view('admin.organizers.organizers', compact('organizers', 'pendingOrganizersCount'));
        }


        // Redirect to the login page or show an error message
        return redirect()->route('admin.login');
    }   

public function deleteOrganizer($id)
{
    $organizer = Organizer::find($id);

    if (!$organizer) {
        return redirect()->route('admin.organizersList')->with('status', 'Organizer not found.');
    }

    // Check if there are associated events
    if ($organizer->events()->exists()) {
        // Load and delete associated events
        $organizer->events()->delete();
    }

    // Finally, delete the organizer
    $organizer->delete();

    return redirect()->route('admin.organizersList')->with('status', 'Organizer and its associated Events are Deleted successfully');
}

    // Attendees list 
    public function attendeesList()
    {
        if (auth()->guard('admin')->check()) {
            $attendees = Attendee::all();
            return view('admin.attendees', compact('attendees'));
        }
        
        // Redirect to the login page or show an error message
        return redirect()->route('admin.login');
    }



    // allevents 
    public function index()
    {
        // Retrieve the logged-in organizer
        $admin = auth()->guard('admin')->user();
    
        // Retrieve all events organized by the organizer with the count of tickets sold
        $events = $admin->events->map(function ($event) {
            $event->ticketsSold = $event->tickets->count();
            return $event;
        });
    
        return view('admin.events.view', compact('events'));
    }
    



    // events 
    public function allEvents()
    {
        if (auth()->guard('admin')->check()) {
            // Retrieve all events with their associated organizer and ticket details
            $events = Event::with('organizer', 'tickets')->get();
    
            // Calculate ticket counts and revenue for each event
            $events->each(function ($event) {
                $event->ticketCount = $event->tickets->count();
                $event->revenue = $event->ticketCount * $event->ticket_price;
            });
    
            return view('admin.events.view', compact('events'));
        }
    
        // Redirect to the login page or show an error message
        return redirect()->route('attendee.login');
    }

    
    public function eventDetails($eventId)
    {
        // Retrieve the logged-in organizer
        $admin = auth()->guard('admin')->user();
    
        // Retrieve the event by ID
        $event = Event::findOrFail($eventId);
    
        // Retrieve revenue and ticket information for the event
        $revenue = $event->calculateRevenue();
        $ticketsSold = $event->tickets()->count(); // Count the number of tickets sold for the event
    
        return view('admin.events.event-details', compact('event', 'revenue', 'ticketsSold'));
    }
    //end method



    public function deleteEvent($id){
        $event = Event::find($id);
        $event->delete();
            // $event->delete();
            return redirect()->route('admin.events')->with('status','Event Deleted successfully');     
            
            
         }


        //  admin logout 
        
         public function adminLockScreen(){
            Auth::guard('admin')->logout();
            return redirect()->route('user.type')->with('error','Logged out  Successfully');
        }//end method
        //  admin logout 

         public function adminLogout(){
            Auth::guard('admin')->logout();
            return redirect()->route('user.type')->with('error','Logged out  Successfully');
        }//end method




}
