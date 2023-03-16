<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'All users',
            'users' => User::latest()->get(),
        );
        return view('admin.user.index')->with($data);
    }
    
    //update the vendor status
    public function updateStatus($id, $status){
        if(CommonHelpers::updateStatus('users', hashids_decode($id), 'status', $status, true)){
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
