<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Contact us',
            'contacts'  => ContactUs::latest()->get(),
        );
        return view('admin.contact_us.index')->with($data);
    }

    //show description in modal
    public function showMessage($id){
        return CommonHelpers::showDescModal('contact_us', hashids_decode($id), 'message', 'components/description_modal', 'Message', true);
    }
}
