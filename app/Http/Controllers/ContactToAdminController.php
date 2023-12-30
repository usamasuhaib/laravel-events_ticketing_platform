<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactToAdminController extends Controller
{
    // public function contactToAdmin(){

    //     //will add condition for attende and organizer
    //     return view('attendee.contact_admin');
    // }


 public function contactToAdmin()
{
    if (auth()->guard('attendee')->check()) {
        return view('attendee.contact_admin');
    } elseif (auth()->guard('organizer')->check()) {
        return view('organizer.contact_admin');
    } else {
        // Handle the case when neither attendee nor organizer is logged in
        return redirect()->route('login'); // Or show an error message
    }
}



}
