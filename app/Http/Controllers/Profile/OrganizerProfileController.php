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



class OrganizerProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

     public function organizerProfile(){

        $organizer = Auth::guard('organizer')->user();

        return view('organizer.profile.profile', compact('organizer'));
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
    
        $organizer = Auth::guard('organizer')->user();
    
        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            // Check if there's an old profile image and delete it
            if ($organizer->profile_image) {
                Storage::disk('public')->delete('organizer-profile-images/' . $organizer->profile_image);
            }
    
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('organizer-profile-images', $imageName, 'public');
    
            // Save the image path in the organizer's database record
            $organizer->profile_image = $imageName;
        }
    
        // Update other organizer profile fields
        $organizer->name = $request->name;
        $organizer->email = $request->email;
        $organizer->gender = $request->gender;
        $organizer->phone = $request->phone;
        $organizer->address = $request->address;
    
        // Save changes
        $organizer->save();
    
        return redirect()->route('organizer.profile')->with('status', 'Profile updated successfully.');
    }

    
    // update password form
    public function passwordUpdateForm(){
        if (auth()->guard('organizer')->check()) {
            return view('organizer.profile.update-password-form');
        }
        
        // Redirect to the login page or show an error message
        return redirect()->route('organizer.login');
    }

    // update password 
    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);
    
        $user = Auth::guard('organizer')->user();
    
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The provided current password does not match your records.']);
        }
    
        $user->update([
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('organizer.passwordUpdateForm')->with('status', 'Password updated successfully.');
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
