<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendingOrganizer;
use App\Models\Organizer;
use Auth;

class OrganizerApprovalController extends Controller
{
    // ...

    public function pendingOrganizersList()
    {
        if (auth()->guard('admin')->check()) {
            $pending_organizers = pendingOrganizer::all();
            return view('admin.organizers.pending_organizers', compact('pending_organizers'));
        }

        // Redirect to the login page or show an error message
        return redirect()->route('admin.login');
    }

    public function approveOrganizer($id)
    {

        if (auth()->guard('admin')->check()) {
           // Find the pending organizer by ID
        $pendingOrganizer = pendingOrganizer::findOrFail($id);

        // Create a new organizer using the data from the pending organizer
        $organizer = new Organizer([
            'name' => $pendingOrganizer->name,
            'email' => $pendingOrganizer->email,
            'password' => $pendingOrganizer->password,
            // Add other fields as needed
        ]);

        // Save the organizer
        $organizer->save();

        // Delete the pending organizer
        $pendingOrganizer->delete();

        // Redirect back to the pending organizers list
        return redirect()->route('admin.pendingOrganizersList')
            ->with('success', 'Organizer approved successfully.');




        }

        
        // Redirect to the login page or show an error message
        return redirect()->route('admin.login');


    }


    // Approve All 

    public function approveAllOrganizers()
{


    if (auth()->guard('admin')->check()) {


    
    // Get all pending organizers
    $pendingOrganizers = PendingOrganizer::all();

    // Loop through each pending organizer and create a corresponding organizer
    foreach ($pendingOrganizers as $pendingOrganizer) {
        Organizer::create([
            'name' => $pendingOrganizer->name,
            'email' => $pendingOrganizer->email,
            'password' => $pendingOrganizer->password,
            // Add other fields as needed
        ]);

        // Delete the pending organizer
        $pendingOrganizer->delete();
    }

    return redirect()->route('admin.pendingOrganizersList')
        ->with('status', 'All pending organizers have been approved.');



    }

    // Redirect to the login page or show an error message
    return redirect()->route('admin.login');

}

//.....

}