<?php

use App\Http\Controllers\FrontEnd\FrontEndController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\OrganizerRevenueController;
use App\Http\Controllers\OrganizerTicketVerificationController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContactToAdminController;
use App\Http\Controllers\Profile\OrganizerProfileController;
use App\Http\Controllers\Profile\AdminProfileController;
use App\Http\Controllers\Profile\AttendeeProfileController;
use App\Http\Controllers\OrganizerApprovalController;
use App\Http\Controllers\StripeController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingPageController::class, 'landingPage'])->name('welcome');

// Login page seperator 
Route::get('/user-type', [FrontEndController::class, 'loginSeperator'])->name('user.type');


// profile picture routes

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// admin  routes

Route::prefix('admin')->middleware(['admin.auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');



    // Admin profile 
    Route::get('/profile',[AdminProfileController::class,'adminProfile'])->name('admin.profile');
    Route::get('/profilelock',[AdminProfileController::class,'profileLock'])->name('admin.profileLock');
    
    // Admin Profile update 
    Route::put('/update-profile',[AdminProfileController::class,'updateProfile'])->name('admin.profile.update');

    


    // Update password 

    // form 
    Route::get('/password-update',[AdminProfileController::class,'passwordUpdateForm'])->name('admin.passwordUpdateForm');

    // update
    Route::put('/password-update',[AdminProfileController::class,'passwordUpdate'])->name('passwordUpdate.admin');


    Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');


    // organizers list 
    Route::get('/organizers-list', [AdminController::class, 'organizersList'])
    ->name('admin.organizersList');

    //pending  organizers list 

    Route::get('/pending-organizers-list', [OrganizerApprovalController::class, 'pendingOrganizersList'])
    ->name('admin.pendingOrganizersList');


    // approve organizer 

    Route::get('/approve-organizer/{id}', [OrganizerApprovalController::class, 'approveOrganizer'])->name('admin.approveOrganizer');

    // approve all organizers 

    Route::post('/approve-all-organizers', [OrganizerApprovalController::class, 'approveAllOrganizers'])
    ->name('admin.approveAllOrganizers');

    Route::get('/delete-organizer/{id}',[AdminController::class,'deleteOrganizer'])->name('admin.deleteOrganizer');



    // Attendees list 
    Route::get('/attendees-list', [AdminController::class, 'attendeesList'])
    ->name('admin.attendeesList');

    // events 
    Route::get('/events', [AdminController::class, 'allEvents'])
    ->name('admin.events');
    Route::get('/event-details/{eventId}',[AdminController::class,'eventDetails'])->name('admin.eventDetails');







    Route::get('/delete-event/{id}',[AdminController::class,'deleteEvent'])->name('admin.deleteEvent'); 




});


require __DIR__.'/adminauth.php';


/*----------------------------------
End  Admin Routes
--------------------------------------
*/




// organizer  routes

Route::prefix('organizer')->middleware(['organizer.auth'])->group(function () {
    Route::get('/dashboard', [OrganizerController::class, 'dashboard'])
    ->name('organizer.dashboard');

      // Organizer profile 
      Route::get('/profile',[OrganizerProfileController::class,'organizerProfile'])->name('organizer.profile');
    
      // Organizer Profile update 
      Route::put('/update-profile',[OrganizerProfileController::class,'updateProfile'])->name('organizer.profile.update');

     // update password form 
     Route::get('/password-update',[OrganizerProfileController::class,'passwordUpdateForm'])->name('organizer.passwordUpdateForm');

     // update password
     Route::put('/password-update',[OrganizerProfileController::class,'passwordUpdate'])->name('passwordUpdate.organizer');


    // Events 
   
        Route::get('/events',[OrganizerController::class,'viewEvents'])->name('organizer.event');
        Route::get('/add-event',[OrganizerController::class,'addEvent'])->name('organizer.addEvent');
        
            // edit and store 
        Route::post('/add-event',[OrganizerController::class,'storeEvent'])->name('organizer.storeEvent');

         Route::get('/edit-event/{id}',[OrganizerController::class,'editEvent'])->name('organizer.editEvent');
        Route::put('/edit-event/{id}',[OrganizerController::class,'updateEvent'])->name('organizer.updateEvent');

        Route::get('/event-details/{id}',[OrganizerController::class,'eventDetails'])->name('organizer.eventDetails');

        Route::get('/delete-event/{id}',[OrganizerController::class,'deleteEvent'])->name('organizer.deleteEvent'); 


        //contact to admin
        Route::get('/contact-to-admin',[ContactToAdminController::class,'contactToAdmin'])->name('contactToAdmin');

        // Revenue module routes
         
        Route::get('/revenue',[OrganizerRevenueController::class,'index'])->name('organizer.revenue.index');
        Route::get('/revenue/{eventId}',[OrganizerRevenueController::class,'show'])->name('organizer.revenue.show');



        // Ticket Verification 
        // Show ticket details form
        Route::get('/ticket-verification',[OrganizerTicketVerificationController::class,'index'])->name('organizer.ticket-verification');

        // Handle ticket verification
        Route::post('/ticket-verification',[OrganizerTicketVerificationController::class,'verify'])->name('organizer.ticket-verify');
    

        // download list 
        Route::get('/download-attendees/{eventId}',[OrganizerController::class,'downloadAttendees'])->name('organizer.download-attendees');




    
        // Logout 
        Route::get('/logout', [OrganizerController::class, 'organizerLogout'])->name('organizer.logout');




});

require __DIR__.'/organizerauth.php';
/*----------------------------------
End  Organizer Routes
--------------------------------------
*/



// attendee  routes

Route::prefix('attendee')->middleware(['attendee.auth'])->group(function () {
    Route::get('/dashboard', [AttendeeController::class, 'dashboard'])
    ->name('attendee.dashboard');


      // Organizer profile 
      Route::get('/profile',[AttendeeProfileController::class,'attendeeProfile'])->name('attendee.profile');
    
      // Organizer Profile update 
      Route::put('/update-profile',[AttendeeProfileController::class,'updateProfile'])->name('attendee.profile.update');

    
     // password update form 
     Route::get('/password-update',[AttendeeProfileController::class,'passwordUpdateForm'])->name('attendee.passwordUpdateForm');

     // password update
     Route::put('/password-update',[AttendeeProfileController::class,'passwordUpdate'])->name('passwordUpdate.attendee');

     // events 
     Route::get('/events',[AttendeeController::class,'allEvents'])->name('attendee.events');
     Route::get('/event-details/{id}',[AttendeeController::class,'eventDetails'])->name('event.details');
     
     Route::get('/search-results',[EventController::class,'search'])->name('events.search');


 
     

    Route::get('/add-to-cart/{eventId}',[AttendeeController::class,'addToCart'])->name('attendee.addToWishlist');
    Route::get('/remove-from-cart/{eventId}',[AttendeeController::class,'removeFromCart'])->name('attendee.removeFromWishlist');

    //events in  wishlist
    Route::get('/my_cart',[AttendeeController::class,'myCart'])->name('attendee.wishlist');

    //contact to admin
    Route::get('/contact-to-admin',[ContactToAdminController::class,'contactToAdmin'])->name('contactToAdmin');

   
    // stripe payment 


    // chekout form cart or event details 
    Route::get('/stripe/{id}',[StripeController::class,'index'])->name('attendee.stripe');

    Route::get('/stripe-checkout/{id}',[StripeController::class,'checkout'])->name('attendee.stripeCheckOut');

    Route::post('/stripe-checkout-cart/{id}',[StripeController::class,'checkoutFromCart'])->name('attendee.stripeCartCheckOut');





    // after successfull payment 
    
    Route::get('/payment-success/{eventId}',[StripeController::class,'handlePaymentSuccess'])->name('attendee.paymentSuccess');

    Route::get('/download-ticket/{eventId}',[AttendeeController::class,'downloadTicket'])->name('attendee.downloadTicket');

    // Route::get('attendee/paymentSuccess/{eventId}', 'YourController@paymentSuccess')->name('attendee.paymentSuccess');


    // purchased tickets 
    Route::get('/my-tickets',[AttendeeController::class,'myTickets'])->name('attendee.tickets');
    Route::get('/reserved-event-details/{id}',[AttendeeController::class,'reservedEventDetails'])->name('attendee.reserved.eventDetails');

    



    //  log out
     Route::get('/logout', [AttendeeController::class, 'attendeeLogout'])->name('attendee.logout');



});
// Route::get('/attendee/logout', [AttendeeController::class, 'attendeeLogout'])->name('attendee.logout');


require __DIR__.'/attendeeauth.php';

/*----------------------------------
End  Attendee Routes
--------------------------------------
*/



/*----------------------------------
Event  Routes start
--------------------------------------
*/



/*----------------------------------
End  Attendee Routes
--------------------------------------
*/



