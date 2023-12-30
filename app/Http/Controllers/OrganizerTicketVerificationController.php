<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organizer;
use App\Models\Event;
use App\Models\Ticket;

class OrganizerTicketVerificationController extends Controller
{


public function index()
{
    return view('organizer.ticketVerification.ticket-verification');
}


public function verify(Request $request)
{
    // dd('Reached before validation'); // Debugging statement

    $request->validate([
        'ticket_id' => 'required|exists:tickets,ticket_id',
    ]);

    // dd('Reached after validation'); // Debugging statement

    $ticket = Ticket::where('ticket_id', $request->input('ticket_id'))->first();


    if (!$ticket) {
        return redirect()->route('organizer.ticket-verification')->with('error', 'Ticket not found.');
    }


    // Retrieve attendee details associated with the ticket
    $attendee = $ticket->attendee;
    $paymentStatus = $ticket->payment_status;

    return view('organizer.ticketVerification.ticket-verification-result', compact('ticket', 'attendee', 'paymentStatus'));
}


}
