<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Organizer;
use App\Models\TicketType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;




class EventController extends Controller
{
    public function test(){
    

        return Organizer::with('events');
    }

    
    // public function viewEvents(){
    //     $organizer = Auth::guard('organizer')->user();
    //     $data = $organizer->events;

    //     return view('organizer.events.view',['events'=>$data]);
    // }//end method
   
    public function allEvents()
    {
        if (auth()->guard('attendee')->check()) {
            $events = Event::with('organizer')->get();
            // $events = Event::all()->with('organizer')->get();;
            return view('attendee.events.view', compact('events'));
            // return view('attendee.events.view', ['events' => $events]);
        }
        
        // Redirect to the login page or show an error message
        return redirect()->route('attendee.login');
    }//end method




}
