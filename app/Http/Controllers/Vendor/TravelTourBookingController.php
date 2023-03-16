<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Administrator\TravelTourBookingController as AdministratorTravelTourBookingController;
use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class TravelTourBookingController extends AdministratorTravelTourBookingController
{
    public function index(){
        $data = array(
            'title' => 'Travel & Tour Bookings',
            'bookings'  => Vendor::with(['bookings'])->where('id', auth('vendor')->id())->first(),
        );
       return view('vendors.travel_tour_booking.index')->with($data);
    }
}
