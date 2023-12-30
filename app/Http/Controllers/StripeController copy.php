<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Ticket;
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

    
    public function checkout()
    {
        // Set your Stripe API key
        Stripe::setApiKey(config('stripe.sk'));
    
        try {
            // Create a test Price
            $price = Price::create([
                'unit_amount' => 1000, // Amount in cents (e.g., $10.00)
                'currency' => 'usd',   // Currency code
                'product_data' => [
                    'name' => 'Test Product', // Name of your product
                ],
            ]);
    
            // Retrieve the Price ID
            $priceId = $price->id;
    
            // Create a Checkout Session with the Price ID
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price' => $priceId, // Use the retrieved Price ID
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('attendee.paymentSuccess'),
                'cancel_url' => route('attendee.events'),
            ]);
    
            // Redirect to the Stripe Checkout page
            return redirect()->away($session->url);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Handle any errors that may occur during Price or Session creation
            return back()->with('error', 'An error occurred while processing your request.');
        }
    }
   


    // app/Http/Controllers/PaymentController.php

    public function PaymentSuccess(Request $request)
{
    // Logic to process the payment (e.g., Stripe) and get payment status
    $paymentStatus = $this->checkout($request->input('payment_token'));

    // Assuming $paymentStatus is 'succeeded' for a successful payment
    if ($paymentStatus === 'succeeded') {
        // Update the ticket status to 'paid' for the attendee
        $ticket = Ticket::findOrFail($request->input('ticket_id'));
        $ticket->status = 'paid';
        $ticket->save();

        // Redirect to a page where the attendee can print the ticket
        return redirect()->route('attendee.printTicket', ['ticket' => $ticket]);
    }

    // Handle payment failure
    return redirect()->route('attendee.events')->with('error', 'Payment failed.');
}





}
