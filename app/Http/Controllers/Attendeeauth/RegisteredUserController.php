<?php

namespace App\Http\Controllers\Attendeeauth;

use App\Http\Controllers\Controller;
use App\Models\Attendee;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Illuminate\Support\Facades\Validator;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('attendee.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

      //  (Request $request)
      public function store(Request $request)
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
  
              $new_attendee = new Attendee;
              $new_attendee->name = $request->name;
              $new_attendee->email = $request->email;
              
              $new_attendee->password = Hash::make($request->password); // Hash the password
              
             //  dd($new_organizer);
              $new_attendee->save();
 
              return redirect()->route('attendee.login')->with('status','Registered Successfully');
      }
  




    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Attendee::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     $user = Attendee::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     event(new Registered($user));

    //     Auth::guard('attendee')->login($user);

    //     return redirect(RouteServiceProvider::ATTENDEE_HOME);
    // }
}
