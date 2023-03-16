<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Models\TravelTourBooking;
use Illuminate\Http\Request;

class TravelTourBookingController extends Controller
{
    public function index(){
        $data = array(
            'title'     => 'Travel & Tour Bookings',
            'bookings'  => TravelTourBooking::with(['vendor_package:id,title'])->latest()->get(),
        );
        return view('admin.travel_tour_booking.index')->with($data);
    }
    
    //booking details
    public function bookingDetails($id){
        $data = array(
            'title' => 'Travel & Tours Booking Details',
            'details'   => TravelTourBooking::with(['vendor_package.vendor'])->findOrFail(hashids_decode($id)),
        );
        return view('admin.travel_tour_booking.detail')->with($data);
    }
    
    //update the vendor status
    public function updateStatus($id, $status){
        if(CommonHelpers::updateStatus('travel_tours_bookings', hashids_decode($id), 'status', $status, true)){
            return response()->json([
                'success'    => 'Status updated successfully',
                'reload'    => true
            ]);
        };
        return response()->json([
            'error' => 'Unable to update status'
        ]);
    }
}
