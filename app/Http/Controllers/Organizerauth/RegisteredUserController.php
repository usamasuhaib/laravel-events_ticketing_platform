<?php

namespace App\Http\Controllers\Organizerauth;

use App\Http\Controllers\Controller;
// use App\Models\Organizer;
use App\Models\pendingOrganizer;


use App\Providers\RouteServiceProvider;
use Illuminate\Auth\organizers\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('organizer.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    
    //  (Request $request)
     public function storeForApprovel(Request $request)
     {
         // dd($request);
         $validator = Validator::make($request->all(),[
             'name' => 'required',
             'email' => 'required|email',
             'password' => 'required',
 
             ]);
             if ($validator->fails()) {
                 return redirect()->back()->withErrors($validator)->withInput();
             }
 
             $new_organizer = new pendingOrganizer;
             $new_organizer->name = $request->name;
             $new_organizer->email = $request->email;
             
             $new_organizer->password = Hash::make($request->password); // Hash the password
             
            //  dd($new_organizer);
             $new_organizer->save();

             return redirect()->route('organizer.login')->with('status','New organizer Created successfully');
     }
 



    // test to store 
    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:organizers,email',
            'password' => 'required',

            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $organizer = new Organizer;
            $organizer->name = $request->name;
            $organizer->email = $request->email;
            
            $organizer->password = Hash::make($request->password); // Hash the password
            
            $organizer->save();
            return redirect()->route('organizer.login')->with('status','New organizer Created successfully');
    }








}
