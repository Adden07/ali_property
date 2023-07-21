<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\VendorRequest;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\map;

class VendorController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'All vendors',
            'vendors'   => Vendor::withCount(['properties'])->with(['cities'])->latest()->get(),
        );
        return view('admin.vendor.index')->with($data);
    }

    public function add(){
        $data = array(
            'title' => 'Add vendor'
        );
        return view('admin.vendor.add')->with($data);
    }

    public function store(VendorRequest $req){
        $validated = $req->validated();//get all the validated inputs

        if(is_check($validated['vendor_id'])){//if vendor id is set then update the record otherwise insert new
            $vendor = Vendor::findOrFail(hashids_decode($validated['vendor_id']));
            $msg    = 'Vendor updated successfully';
        }else{
            $vendor = new Vendor();
            $msg    = 'Vendor added successfully';
        }
        
        if(collect($validated)->has('image') && !empty($validated['image'])){//upload image
            $vendor->image = CommonHelpers::uploadSingleFile($validated['image'], 'admin_uploads/vendor_profiles/', 'png,jpg,jpeg', '1080');
        }

        $vendor->company_name        = $validated['company_name'];
        $vendor->contact_person_name = $validated['contact_person_name'];
        $vendor->contact_no          = $validated['contact_no'];
        $vendor->email               = $validated['email'];
        $vendor->password            = Hash::make(@$validated['password']);
        $vendor->business_type       = $validated['business_type'];
        $vendor->save();

        return response()->json([
            'success'   => $msg,
            'redirect'  => route('admin.vendors.index')
        ]);
    }

    public function edit($id){//edit vendor
        $data = array(
            'title'         => 'Edit vendor',
            'edit_vendor'   => Vendor::findOrFail(hashids_decode($id)),
            'is_update'     => true
        );
        return view('admin.vendor.add')->with($data);
    }

    public function delete($id){//delete the vendor
        if(is_check($id)){
            Vendor::destroy(hashids_decode($id));
            return response()->json([
                'success'   => 'Vendor deleted successfully',
                'reload'    => true
            ]);
        }
        abort(404);
    }

    //update the vendor status
    public function updateStatus($id, $status){
        if(CommonHelpers::updateStatus('vendors', hashids_decode($id), 'status', $status, true)){
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
