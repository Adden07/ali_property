<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Models\PackageType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PackageTypeController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'All package types',
            'types' => PackageType::latest()->get(),
        );
        return view('admin.package_type.index')->with($data);
    }

    public function store(Request $req){
        
        $req->validate([
            'package_type'  => ['required', 'max:100'],
            'image'         => ['nullable', 'max:2048', 'mimes:jpg,jpeg,png', Rule::requiredIf(!isset($req->package_type_id))]
        ]);
        
        if(is_check($req->package_type_id)){
            $pkg = PackageType::findOrFail(hashids_decode($req->package_type_id));
            $msg = 'Package type updated successfully';
        }else{
            $pkg = new PackageType();
            $msg = 'Package type added successfully';
        }

        if($req->hasFile('image')){
            $pkg->image = CommonHelpers::uploadSingleFile($req->image, 'admin_uploads/package_types/', 'jpg,jpeg,png', '2048');
        }

        $pkg->title = $req->package_type;
        $pkg->save();

        return response()->json([
            'success'   => $msg,
            'redirect'  => route('admin.package_types.index')
        ]);
    }

    public function edit($id){
        $data = array(
            'title'     => 'All package types',
            'types'     => PackageType::latest()->get(),
            'edit_type' => PackageType::findOrFail(hashids_decode($id)),
            'is_update' => true
        );
        return view('admin.package_type.index')->with($data);
    }

    public function delete($id){
        PackageType::destroy(hashids_decode($id));
        return response()->json([
            'success'   => 'Package type deleted successfully',
            'reload'    => true
        ]);
    }
    //update the vendor status
    public function updateStatus($id, $status){
        if(CommonHelpers::updateStatus('package_types', hashids_decode($id), 'status', $status, true)){
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
