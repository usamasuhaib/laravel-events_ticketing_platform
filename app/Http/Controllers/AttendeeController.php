<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Attendee;
use App\Models\Cart;

use Auth;

class AttendeeController extends Controller
{
    // public function dashboard(){
    //     return view('attendee.dashboard');    
    // }

        public function dashboard()
        {
            if (auth()->guard('attendee')->check()) {
                $totalEventsCount = Event::count();
                // $attendeesCount = Attendee::count();
                // compact('organizers', 'pendingOrganizersCount')
                return view('attendee.dashboard', compact('totalEventsCount'));
            }
            
            // Redirect to the login page or show an error message
            return redirect()->route('admin.login');
        }


        public function allEvents()
    {
        $attendee = Auth::guard('attendee')->user();
        // dd('attendee');

 
        $data=Event::all();



        return view('attendee.events.view', compact('data'));
    }



    
        public function eventDetails($id)
        {
            $event = Event::with('organizer')->find($id);
            
            $eventIsInWishlist = false; // Initialize as false
            
            $attendee = Auth::guard('attendee')->user();
            // $eventIsInWishlist = $attendee->my_cart->contains('id', $event->id);

            // $eventsInCart = $attendee->my_cart()->withPivot('status', 'paid_amount')->get();


            // Retrieve the events in the cart with their associated payment detail
        
            // $eventsInCart = $attendee->my_cart()->withPivot('status', 'paid_amount')->get();
        
        
            return view('attendee.events.event-details', compact('event', 'eventIsInWishlist'));
        }



        // add event to wishlist 

            public function addToCart(Request $request, $eventId)
        {

            if (auth()->guard('attendee')->check()) {
            
            $attendee = auth()->guard('attendee')->user();
            $event = Event::findOrFail($eventId);

            $attendee->my_cart()->attach($event);

            return redirect()->back()->with('status', 'Event added to wishlist.');
            }
            
            // Redirect to the login page or show an error message
            return redirect()->route('attendee.login');

        }

    // Remove event from wishlist 

        public function removeFromCart(Request $request, $eventId)
        {
            $attendee = auth()->guard('attendee')->user();
            $event = Event::findOrFail($eventId);

            $attendee->my_cart()->detach($event);

            return redirect()->back()->with('status', 'Event removed from Cart.');
        }


    // events in wishlist 
    public function myCart()
    {
        $attendee = Auth::guard('attendee')->user();

        // Retrieve the events in the cart with their associated payment detail
        $eventsInCart = $attendee->eventsInCart()->get();

        // $eventsInCart = $attendee->my_cart()->get();


        // dd($attendee);

        return view('attendee.events.my_cart', compact('eventsInCart'));
    }

    public function myTickets()
    {
        // Ensure that the attendee is authenticated
        if (Auth::guard('attendee')->check()) {
            $attendee = Auth::guard('attendee')->user();
    
            // Retrieve the tickets associated with the attendee, including event details
            $myTickets = $attendee->tickets()->with('event')->get();
    
            // Pass the tickets and attendee information to the view
            return view('attendee.events.my_tickets', compact('myTickets'));
        }
    
        // If authentication fails, you can handle it accordingly (e.g., redirect to login)
        return redirect()->route('attendee.login')->with('error', 'Authentication failed.');
    }
    public function reservedEventDetails($id)
    {
        $event = Event::with('organizer')->find($id);
        
        
        $attendee = Auth::guard('attendee')->user();
    
    
        return view('attendee.events.reserved-event-details', compact('event'));
    }

    public function downloadTicket($id)
    {
        $event = Event::with('organizer')->find($id);
    
        // Check if the event exists
        if (!$event) {
            // Handle the case where the event with the given ID doesn't exist
            return redirect()->route('attendee.events.view')->with('error', 'Event not found.');
        }
    
        // Retrieve the associated ticket (assuming there's a relationship between Event and Ticket)
        $ticket = $event->tickets()->first(); // You might need to adjust this based on your actual relationship
    
        // Retrieve the organizer associated with the event
        $organizer = $event->organizer;
    
        // Pass the event, ticket, and organizer data to the view
        return view('attendee.events.recepit', ['event' => $event, 'ticket' => $ticket, 'organizer' => $organizer]);
    }
    
    

        // log out 

        public function attendeeLogout(){
            Auth::guard('attendee')->logout();
            return redirect()->route('user.type')->with('error','Logged out  Successfully');
        }//end method
}
