<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
use App\Models\Cart;
use App\Models\Attendee;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Price;

class StripeController extends Controller
{

    // index 
    
    
    // public function index($id){phpvent' => $event]);
    // }

 public function index($id){
    $event = Event::with('organizer')->find($id);

    // Check if the event exists
    if (!$event) {
        // Handle the case where the event with the given ID doesn't exist
        return redirect()->route('attendee.events.view')->with('error', 'Event not found.');
    }

    return view('attendee.events.checkout', ['event' => $event]);
}



    // checkout 

    
    public function checkout($eventId)
    {
        // Set your Stripe API key
        Stripe::setApiKey(config('stripe.sk'));
    
        // Fetch the event based on the provided $eventId
        $event = Event::find($eventId);
    
        if (!$event) {
            return back()->with('error', 'Event not found.');
        }
    
        try {
            // Create a Checkout Session with the ticket price from the event
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd', // Currency code
                            'unit_amount' => $event->ticket_price * 100, // Convert to cents
                            'product_data' => [
                                'name' => 'Ticket for Event: ' . $event->event_title,
                            ],
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('attendee.paymentSuccess', ['eventId' => $event->id]),
                'cancel_url' => route('attendee.events'),
            ]);
    
            // Redirect to the Stripe Checkout page
            return redirect()->away($session->url);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Handle any errors that may occur during Session creation
            return back()->with('error', 'An error occurred while processing your request.');
        }
    }
    

    // check out from cart or event details 

    public function checkoutFromCart($eventId)
    {
        // Set your Stripe API key
        Stripe::setApiKey(config('stripe.sk'));
    
        // Fetch the event based on the provided $eventId
        $event = Event::find($eventId);
    
        if (!$event) {
            return back()->with('error', 'Event not found.');
        }
    
        try {
            // Create a Checkout Session with the ticket price from the event
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd', // Currency code
                            'unit_amount' => $event->ticket_price * 100, // Convert to cents
                            'product_data' => [
                                'name' => 'Ticket for Event: ' . $event->event_title,
                            ],
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('attendee.paymentSuccess', ['eventId' => $event->id]),

                'cancel_url' => route('attendee.events'),
            ]);
    
            // Redirect to the Stripe Checkout page
            return redirect()->away($session->url);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Handle any errors that may occur during Session creation
            return back()->with('error', 'An error occurred while processing your request.');
        }
    }



    
    public function handlePaymentSuccess(Request $request, $eventId)
    {
        // Check if the attendee is authenticated
            $attendee = auth()->guard('attendee')->user();
            
            // dd($attendee->id);
            $event = Event::findOrFail($eventId);
            $ticketId = 'GB-Events' . uniqid(); // Example: T5f4c8a2d74e25
            $organizer = $event->organizer;

            // $status="Confirmed";

    
            // Assuming you have obtained the ticket price and other ticket details
            $ticketData = [
                'event_id' => $event->id,
                'ticket_id' => $ticketId,
                'price' => $event->ticket_price, 
                'status' => 'Confirmed',
                'attendee_id' => $attendee->id,
            'organizer_id' => $event->organizer->id, // Add organizer_id
            ];
    
            // Create a new ticket in the Ticket table
            $ticket = Ticket::create($ticketData);
    
            // Remove the event from the attendee's cart
            $attendee->eventsInCart()->detach($event->id);
    
            // Redirect to a suitable route with a success message
            return redirect()->route('attendee.tickets')->with('status', 'Payment Successful. Your ticket details have been added.');

    }
    
 


    
  
    



}


