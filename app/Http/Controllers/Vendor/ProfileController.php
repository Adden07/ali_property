<?php

namespace App\Http\Controllers\Vendor;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\VendorProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $data = array(
            'title'         => 'Update profile',
            'edit_profile'  => auth('vendor')->user(),
            'is_update'     => true
        );
        return view('vendors.profile.index')->with($data);
    }

    public function updateProfile(VendorProfileRequest $req){
        
        $validated = $req->validated();
        $user      = auth('vendor')->user();

        if(!empty($validated['image'])){
            $user->image = CommonHelpers::uploadSingleFile($validated['image'], 'admin_uploads/vendor_profiles/', 'png,jpg,jpeg', '1080');
        }   

        if(!empty($validated['password'])){
            $user->password = Hash::make(@$validated['password']);
        }

        $user->company_name        = $validated['company_name'];
        $user->contact_person_name = $validated['contact_person_name'];
        $user->contact_no          = $validated['contact_no'];
        $user->save();

        return response()->json([
            'success'   => 'Vendor profile updated successfully',
            'reload'    => true
        ]);
    }
}
