<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Administrator\AdminController;
use App\Models\AdminReview;
use App\Models\AffiliatePartnership;
use App\Models\ContactUs;
use App\Models\Faq;
use App\Models\Newsletter;
use App\Models\Offer;
use App\Models\SoftwareService;
use App\Models\TravelTourBooking;
use App\Models\User;
use App\Models\Vendor;
use App\Models\VendorPackage;
use Illuminate\Support\Facades\DB;

class HomeController extends AdminController
{
    public function index()
    {   
        $data = array(
            "title" => "Dashboad",
            'vendors_count'             => Vendor::count(),
            'software_services_count'   => SoftwareService::count(),
            'vendor_packages_count'     => VendorPackage::when(auth('vendor'), function($query){
                                                    $query->where('vendor_id', auth('vendor')->id());
                                                })->count(),
            'faqs_count'                => Faq::count(),
            'reviews_count'             => AdminReview::count(),
            'booking_count'             => TravelTourBooking::get(['id', 'status']),
            'affiliate_partners_count'  => AffiliatePartnership::count(),
            'contact_us_count'          => ContactUs::count(),
            'offers_count'              => Offer::count(),
            'newletters_count'          => Newsletter::count(),
            'users_count'               => User::count(),
        );
        return view('admin.home')->with($data);
    }
}
