<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Models\AffiliatePartnership;
use Illuminate\Http\Request;

class AffiliatePartnershipController extends Controller
{
    public function index(){
        $data = array(
            'title'         => 'Affiliate Partnership',
            'partnerships'  => AffiliatePartnership::latest()->get(),
        );
        return view('admin.affiliate_partnership.index')->with($data);
    }
}
