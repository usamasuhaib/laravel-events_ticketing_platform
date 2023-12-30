<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;


use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;



class AttendeeProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

     public function attendeeProfile(){

        $attendee = Auth::guard('attendee')->user();

        return view('attendee.profile.profile', compact('attendee'));
     }

     
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            // ... Your other validation rules ...
            'profile_image' => [
                'nullable', // Make the profile image field nullable
                'image',
                'mimes:jpeg,png,jpg,gif',
                'max:2048',
                'dimensions:min_width=100,min_height=100',
                'dimensions:max_width=800,max_height=800',
            ],
        ], [
            'profile_image.dimensions' => 'The profile image must be between 100x100 and 800x800 pixels.',
            'profile_image.max' => 'The profile image cannot be larger than 2MB.',
        ]);
    
        $attendee = Auth::guard('attendee')->user();
    
        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Check if there's an old profile image and delete it
            if ($attendee->profile_image) {
                Storage::disk('public')->delete('attendee-profile-images/' . $attendee->profile_image);
            }
    
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('attendee-profile-images', $imageName, 'public');
    
            // Save the image path in the attendee's database record
            $attendee->profile_image = $imageName;
        }
    
        // Update other attendee profile fields
        $attendee->name = $request->name;
        $attendee->email = $request->email;
        $attendee->gender = $request->gender;
        $attendee->phone = $request->phone;
        $attendee->address = $request->address;
    
        // Save changes
        $attendee->save();
    
        return redirect()->route('attendee.profile')->with('status', 'Profile updated successfully.');
    }

     
    // update password form
    public function passwordUpdateForm(){
        if (auth()->guard('attendee')->check()) {
            return view('attendee.profile.update-password-form');
        }
        
        // Redirect to the login page or show an error message
        return redirect()->route('attendee.login');
    }

    // update password 
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);
    
        $user = Auth::guard('attendee')->user();
    
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided current password does not match your records.']);
        }
    
        $user->update([
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('attendee.passwordUpdateForm')->with('status', 'Password updated successfully.');
    }
    







    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
