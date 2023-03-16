<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        $data = array(
            'title'         => 'Update profile',
            'edit_profile'  => auth('admin')->user(),
            'is_update'     => true
        );
        return view('admin.profile.index')->with($data);
    }

    public function updateProfile(AdminProfileRequest $req){
        
        $validated = $req->validated();
        $admin     = auth('admin')->user();
       
        if(!empty($validated['image'])){
            $admin->image = CommonHelpers::uploadSingleFile($validated['image'], 'admin_uploads/admin_profile/', 'png,jpg,jpeg', '1080');
        }
           
        if(!empty($validated['password'])){
            $admin->password = Hash::make(@$validated['password']);
        }

        $admin->name     = $validated['name'];
        $admin->username = $validated['username'];
        $admin->email    = $validated['email'];
        $admin->save();

        return response()->json([
            'success'   => 'Profile updated successfully',
            'reload'    => true
        ]);
    }
}
