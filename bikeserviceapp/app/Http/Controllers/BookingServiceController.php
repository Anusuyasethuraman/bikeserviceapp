<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\BookingService;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingNotificationMail;
use App\Mail\BookingStatusUpdateMail;

class BookingServiceController extends Controller
{
    public function index()
    {
    $services = Service::all();
    // Admin can see the all booking
    if (auth()->user()->isAdmin()) {
       
        $bookings = BookingService::with('service', 'customer')->get();
    } else {
    // Fetch bookings login user
    $bookings = BookingService::where('customer_id', Auth::id())->with('service') ->get();
    }
    return view('bookingservice', compact('services', 'bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required',
            'booking_date' => 'required',
        ]);
        $booking = BookingService::create([
            'customer_id' => auth()->id(),
            'service_id' => $request->service_id,
            'booking_date' => $request->booking_date,
            'status' => 'pending',
        ]);
        $ownerEmail = 'owner@gmail.com'; //owner email

        // Send email to the owner
        Mail::to($ownerEmail)->send(new BookingNotificationMail($booking));
    
        return redirect()->back()->with('success', 'Service booked successfully!');
    }
    public function updateStatus(Request $request, $id)
    {
        $booking = BookingService::findOrFail($id);
        $booking->update(['status' => $request->status]);
        //mail send to customer
        Mail::to($booking->customer->email)->send(new BookingStatusUpdateMail($booking));

        return redirect()->back()->with('success', 'Booking status updated successfully!');
   }
}
