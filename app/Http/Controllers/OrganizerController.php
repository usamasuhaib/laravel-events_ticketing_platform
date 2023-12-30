<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Organizer;
use App\Models\Attendee;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttendeesExport; // Adjust the namespace as needed


use Auth;

class OrganizerController extends Controller
{
    public function dashboard()
    {
        // Get the currently authenticated organizer
        $organizer = Auth::guard('organizer')->user();
    
        // Count the number of events associated with the organizer
        $eventCount = $organizer->events->count();
    
        // Calculate the total number of tickets sold and total revenue earned
        $totalTicketsSold = $organizer->events->sum(function ($event) {
            return $event->tickets()->count();
        });
    
        $totalRevenue = $organizer->events->sum(function ($event) {
            return $event->calculateRevenue();
        });
    
        return view('organizer.dashboard', compact('eventCount', 'totalTicketsSold', 'totalRevenue'));
    }
    




    
    public function addEvent(){
        return view('organizer.events.addEvent');
    }//end method

    public function storeEvent(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'event_title' => 'required',
            'description' => 'required|string|max:500', // Add your desired validation rules here
            'category' => 'required',
            'capacity' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'venue' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif'

            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $organizer = Auth::guard('organizer')->user();

            $event = new Event;
            $event->event_title = $request->event_title;
            $event->description = $request->description;
            $event->category = $request->category;
            $event->capacity = $request->capacity;
            $event->event_date = $request->event_date;
            $event->event_time = $request->event_time;
            $event->venue = $request->venue;
            $event->ticket_price = $request->ticket_price;
            $event->organizer_id = $organizer->id;
            if($request->hasfile('image'))
            {
                $fileName = time().'.'.$request->image->extension();  
         
                $request->image->move(public_path('images/events'), $fileName);
                $event->image=$fileName;
            }

            $event->save();

            return redirect()->route('organizer.event')->with('status','New Event Created successfully');
    }




    public function viewEvents(){
        $organizer = Auth::guard('organizer')->user();
        // dd($organizer->email); // Check the organizer's ID
        $data = $organizer->events;    
        return view('organizer.events.view', ['events' => $data]);
    }


    
    public function editEvent($id){
        $event=Event::find($id);
        return view('organizer.events.editEvent',['event'=>$event]);

        // dd($id);
        // dd($student);
       }


    public function updateEvent(Request $request, $id)
    {

        // dd($request->event_title);
       $request->validate([
            'event_title' => 'required',
            'description' => 'required',
            'category' => 'required',
            'capacity' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'ticket_price' => 'required',
            'venue' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif'

            ]);
            $organizer = Auth::guard('organizer')->user();
            $event = Event::find($id);

            // $event = new Event; no need while update
            $event->event_title = $request->event_title;
            $event->description = $request->description;
            $event->category = $request->category;
            $event->capacity = $request->capacity;
            $event->event_date = $request->event_date;
            $event->event_time = $request->event_time;
            $event->ticket_price = $request->ticket_price;
            $event->venue = $request->venue;


            if($request->hasfile('image'))
            {
                // delete old image 
                Storage::delete('public/images/events/' . $event->image);

                $fileName = time().'.'.$request->image->extension();  
         
                $request->image->move(public_path('images/events'), $fileName);
                $event->image=$fileName;
            }

            $event->update();

            return redirect()->route('organizer.event')->with('status','Event Details are  updated successfully');
    } //update end




    public function eventDetails($id)
    {
        $event = Event::with('organizer')->find($id);
    
        return view('organizer.events.event-details', compact('event'));
    }

    // Download Attendes
    public function downloadAttendees($eventId)
    {
        $event = Event::findOrFail($eventId);
    
        // Retrieve only confirmed attendees for the event with their payment details
        $confirmedAttendees = Ticket::where('event_id', $event->id)
        ->where('status', 'Confirmed')
        ->with(['organizer', 'attendee']) // Load the 'attendee' relation
        ->get();
            
    
        // Check if there are confirmed attendees
        if ($confirmedAttendees->isEmpty()) {
            return redirect()->back()->with('error', 'No confirmed attendees found for this event.');
        }
    
        // Generate the Excel file with confirmed attendee information including payment details
        return Excel::download(new AttendeesExport($confirmedAttendees), 'confirmed_attendees.xlsx');
    }
    
    
    

    

    public function deleteEvent($id){
        $event = Event::find($id);
        $event->delete();
            // $event->delete();
            return redirect()->route('organizer.event')->with('status','Event Deleted successfully');     
            
         }
    // logout 
    public function organizerLogout(){
        Auth::guard('organizer')->logout();
        return redirect()->route('user.type')->with('error','Logged out  Successfully');
    }//end method

}
