<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Organizer;
use App\Models\TicketType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LandingPageController extends Controller
{
   

    public function landingPage(){
        $events = Event::with('organizer')->get();

        // {{ dd($event) }}
        
        return view('welcome', compact('events')); 
       }


}
