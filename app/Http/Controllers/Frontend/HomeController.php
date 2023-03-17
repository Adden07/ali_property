<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AffiliatePartnershipRequest;
use App\Http\Requests\ContactUsRequest;
use App\Http\Requests\TravelTourBookingRequest;
use App\Models\AffiliatePartnership;
use App\Models\ContactUs;
use App\Models\Faq;
use App\Models\Newsletter;
use App\Models\Offer;
use App\Models\PackageAddOn;
use App\Models\PackageType;
use App\Models\Setting;
use App\Models\SoftwareService;
use App\Models\TravelTourBooking;
use App\Models\VendorPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Home',
            // 'services'          => SoftwareService::whereStatus(1)->get(),
            // 'packages'          => PackageType::withCount(['vendorPackage'])->whereStatus(1)->get(),
            // 'vendor_packages'   => VendorPackage::with(['adminReviews', 'bookings'])
            //                                     ->withCount(['bookings', 'adminReviews AS admin_reviews_count'])
            //                                     ->whereStatus('active')
            //                                     ->where('is_featured', 1)
            //                                     ->orWhere('is_best_seller', 1)
            //                                     ->orWhere('is_newest', 1)
            //                                     ->get(),
            // 'offers'            =>  Offer::where('status', 1)->latest()->get(),
            'faqs'    => Faq::where('status', 1)->latest()->get(),  
        );
        
        return view('front.index')->with($data);
    }

    public function itSolution(){
        $data = array(
            'title'     => 'IT Solutions',
            'services'  => SoftwareService::whereStatus(1)->get(),
        );
        return view('front.it_solutions')->with($data);
    }

    public function travelTourisam(){
        $data = array(
            'title' => 'Travel Tourisam',
            'packages'  => VendorPackage::whereStatus('active')->get(),
        );
        return view('front.travel_tourisam')->with($data);
    }

    public function travelTourisamDetail($id){
        $data = array(
            'title' => 'Travel Tourisam Details',
            'package_detail'    => VendorPackage::with(['addOns', 'packageImages', 'adminReviews'])->findOrFail(hashids_decode($id)),
        );
        $data['related_packages']   = VendorPackage::where('pkg_type_id', $data['package_detail']->pkg_type_id)->where('id', '!=', $data['package_detail']->id)->get();

        return view('front.travel_tourisam_details')->with($data);
    }

    public function itSolutionDetail($id){
        $data = array(
            'title' => 'IT solutions details'
        );
        return view('front.software_services_details')->with($data);
    }

    public function affiliatePartnershipForm(){
        $data = array(
            'title' => 'Affiliate Partnership'
        );
        return view('front.affiliate_partnership')->with($data);
    }

    public function travelTourBooking(TravelTourBookingRequest $req){
        $validated     = $req->validated();//get validated data
        $package       = VendorPackage::findOrFail(hashids_decode($validated['vendor_package_id']));//get package
        $add_ons_ids   = array();
        $add_ons_array = array();
        $total_amount  = 0;

        //if add_on_arr isset and not empty then decode all the add on ids
        (is_check(@$validated['add_on_arr'])) ? $add_ons_ids = array_map('hashids_decode', $validated['add_on_arr']) : null;
        
        $booking                    = new TravelTourBooking();
        $booking->booking_id        = generate_order_id('travel_tours_bookings', 'booking_id', 1111111111, 9999999999);
        $booking->user_id           = auth('web')->id() ?? NULL;
        $booking->vendor_package_id = hashids_decode($validated['vendor_package_id']);
        $booking->name              = $validated['name'];
        $booking->email             = $validated['email'];
        $booking->phone_no          = $validated['phone_no'];
        $booking->departure_city    = $validated['departure_city'];
        $booking->timing            = $validated['timing'];
        $booking->travel_date       = $validated['travel_date'];

        if(isset($validated['infant_variation']) && !is_null($package->infant)){
            $booking->no_of_infant  = $validated['infant_variation'];//get no of infant
            $booking->infant_amount = $validated['infant_variation'] * $package->infant;//calculate infant amount
            $total_amount           +=$booking->infant_amount;//sum the amount
        }
        if(isset($validated['child_variation']) && !is_null($package->child)){
            $booking->no_of_child  = $validated['child_variation'];//get no of child
            $booking->child_amount = $validated['child_variation'] * $package->child;//calcluate child amount
            $total_amount           +=$booking->child_amount;//sum the amount

        }
        if(isset($validated['adult_variation']) && !is_null($package->adult)){
            $booking->no_of_adult  = $validated['adult_variation'];//get no of adault
            $booking->adult_amount = $validated['adult_variation'] * $package->adult;//calculate adult amount
            $total_amount          +=$booking->adult_amount;//sum the amount
        }

        if(isset($validated['dinner_variation']) && !is_null($package->dinner)){
            $booking->dinner = $package->dinner;//get dinner amount
            $total_amount    +=$booking->dinner;//sum the amount

        };

        if(is_check($add_ons_ids)){//if add_on_ids is not empty then get the add ons price and title
            $add_ons = PackageAddOn::whereIn('id', $add_ons_ids)->get();
            foreach($add_ons AS $add_on){
                $add_ons_array[] = array(
                    'title' => $add_on->title,
                    'price' => $add_on->price,
                    'type'  => $add_on->type,
                );
                $total_amount += $add_on->price;//sum the amount
            }
            $booking->add_ons = $add_ons_array;
        }

        $booking->total_amount = $total_amount;
        $booking->save();

        return response()->json([
            'success'   => 'Your booking has been placed',
            'reload'    => true
        ]);
    }

    public function affiliatePartnership(AffiliatePartnershipRequest $req){
        
        $validated = $req->validated();

        $partner = new AffiliatePartnership;
        $partner->name          =  $validated['name'];
        $partner->email         =  $validated['email'];
        $partner->company_name  =  $validated['company_name'];
        $partner->phone_no      =  $validated['phone_no'];
        $partner->message       =  $validated['message'];

        if(!empty($validated['attachment'])){

            $partner->attachment = CommonHelpers::uploadSingleFile($validated['attachment'], 'front_uploads/affiliate_partnership_attachments/', 'pdf,jpg,jpeg,png', '1080');
        }

        $partner->save();

        return response()->json([
            'success'   => 'Affiliate parntership form submitted successfully',
            'reload'    => true
        ]);
    }

    public function contactUsForm(){
        $data = array(
            'title' => 'Contact us'
        );
        return view('front.contact_us')->with($data);
    }

    public function contactUs(ContactUsRequest $req){
        $validated = $req->validated();

        $contact = new ContactUs;
        $contact->first_name    = $validated['first_name'];
        $contact->last_name     = $validated['last_name'];
        $contact->email         = $validated['email'];
        $contact->message       = $validated['message'];
        $contact->save();
        
        return response()->json([
            'success'   => 'Contact us form submitted successfully',
            'reload'    => true
        ]);
    }

    public function newsletter(Request $req){
        $req->validate([
            'email' => ['required', 'email', 'max:50']
        ]);

        Newsletter::insert(['email'=>$req->email, 'created_at'=>now(), 'updated_at'=>now()]);
        
        return response()->json([
            'success'   => 'Newsletter submitted successfully',
            'reload'    => true
        ]);
    }

    public function privacyPolicy(){
        $data = array(
            'title' => 'Privacy Policy',
            'data'  => Setting::where('type', 'privacy_policy')->first(),
        );
        return view('front.privacy_policy')->with($data);
    }

    public function termOfUse(){
        $data = array(
            'title' => 'Terms of use',
            'data'  => Setting::where('type', 'term_of_use')->first(),
        );
        return view('front.term_of_use')->with($data);
    }

    public function support(Request $req){
        $data = array(
            'title' => 'Support',
            'faqs'  => Faq::where('status', 1)->when(isset($req->search), function($query) use ($req){
                                $query->where('question', 'like', '%'.$req->search.'%')->orWhere('answer', 'like', '%'.$req->search.'%');
                            })->latest()->get(),

        );
        return view('front.support')->with($data);
    }

    //show vendor signup form
    public function vendorSignupForm(){
        $data = array(
            'title' => 'Vendor signup'
        );
        return view('front.vendor_signup');
    }
}
