<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Models\VendorPackage;
use Illuminate\Http\Request;

class VendorPackageController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Vendor packages',
            'packages'  => VendorPackage::with(['vendor:id,company_name', 'package_type:id,title', 'country:id,country_name'])->latest()->get(),
        );
        return view('admin.vendor_package.index')->with($data);
    }

    //show description in modal
    public function showDescription($id){
        return CommonHelpers::showDescModal('vendor_packages', hashids_decode($id), 'description', 'components/description_modal', 'Package    Description', true);
    }

    //update the vendor status
    public function updateStatus($id, $status, $column_name='status'){
        if(CommonHelpers::updateStatus('vendor_packages', hashids_decode($id), $column_name, $status, true, true)){
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
