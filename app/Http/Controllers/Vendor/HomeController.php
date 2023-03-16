<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\Vendor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   
        $data = array(
            "title"             => "Dashboad",
            'bookings_count'    => Vendor::with(['bookings'])->where('id', auth('vendor')->id())->first()
        );
        return view('admin.home')->with($data);
    }
}
