<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\SoftwareServiceRequest;
use App\Models\SoftwareService;
use Illuminate\Http\Request;

class SoftwareServiceController extends Controller
{
    public function index(){
        $data = array(
            'title'     => 'All software services',
            'services'  => SoftwareService::latest()->get(),
        );
        return view('admin.software_service.index')->with($data);
    }

    public function add(){
        $data = array(
            'title' => 'Add software service'
        );
        return view('admin.software_service.add')->with($data);
    }

    public function store(SoftwareServiceRequest $req){
        
        $validated = $req->validated();

        if(is_check($validated['software_service_id'])){//if software_service_id is set then update orthewise insert new record
            $service = SoftwareService::findOrFail(hashids_decode($validated['software_service_id']));
            $msg     = 'Software service updated successfully';
        }else{
            $service = new  SoftwareService();
            $msg     = 'Software service added successfully';
        }

        if(!empty($validated['image'])){
            $service->image = CommonHelpers::uploadSingleFile($validated['image'], 'admin_uploads/software_services/', 'jpg,jpeg,png', 1080);
        }

        $service->service_name  = $validated['service_name'];
        $service->short_desc    = $validated['service_name'];
        $service->long_desc     = $validated['long_desc'];
        $service->is_form       = is_null(@$validated['is_form']) ? 0 : 1;
        $service->save();

        return response()->json([
            'success'   => $msg,
            'redirect'    => route('admin.software_services.index')
        ]);
    }

    public function edit($id){
        $data = array(
            'title'         => 'Edit software service',
            'edit_service'  => SoftwareService::findOrFail(hashids_decode($id)),
            'is_update'     => true
        );
        return view('admin.software_service.add')->with($data);
    }

    public function delete($id){//delete the vendor
        if(is_check($id)){
            SoftwareService::destroy(hashids_decode($id));
            return response()->json([
                'success'   => 'Software service deleted successfully',
                'reload'    => true
            ]);
        }
        abort(404);
    }
    //update the vendor status
    public function updateStatus($id, $status, $column_name='status'){
        if(CommonHelpers::updateStatus('software_services', hashids_decode($id), $column_name, $status, true)){
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
