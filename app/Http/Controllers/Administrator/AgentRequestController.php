<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Models\AgentRequest;
use Illuminate\Http\Request;

class AgentRequestController extends Controller
{
    public function index(){
        $data = array(
            'title'             => 'Agent Requests',
            'agent_requests'    => AgentRequest::latest()->get(),
        );
        return view('admin.agent_request.index')->with($data);
    }

    //show message in modal
    public function showMessage($id){
        return CommonHelpers::showDescModal('agent_requests', hashids_decode($id), 'message', 'components/description_modal', 'Message', true);
    }
    //delete agent requests
    public function delete($id){
        AgentRequest::destroy(hashids_decode($id));
        return response()->json([
            'success'   => 'Agent request deleted successfully',
            'reload'    => true
        ]);
    }
}
