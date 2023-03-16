<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'All FAQS',
            'faqs'  => Faq::latest()->get(),
        );
        return view('admin.faqs.index')->with($data);
    }

    public function add(){
        $data = array(
            'title' => 'Add FAQ'
        );
        return view('admin.faqs.add')->with($data);
    }

    public function store(FaqRequest $req){
        
        $validated = $req->validated();

        if(is_check($validated['faq_id'])){
            $faq = Faq::findOrFail(hashids_decode($validated['faq_id']));
            $msg = 'FAQ updated successfully';
        }else{
            $faq = new Faq;
            $msg = 'FAQ added successfully';
        }

        $faq->question  = $validated['question'];
        $faq->answer    = $validated['answer'];
        $faq->save();

        return response()->json([
            'success'     => $msg,
            'redirect'    => route('admin.faqs.index')
        ]);
    }

    public function edit($id){
        $data = array(
            'title' => 'Edit FAQ',
            'edit_faq'  => Faq::findOrFail(hashids_decode($id)),
            'is_update' => true
        );
        return view('admin.faqs.add')->with($data);
    }

    public function delete($id){
        Faq::destroy(hashids_decode($id));
        return response()->json([
            'success'   => 'FAQ deleted successfully',
            'reload'    => true
        ]);
    }
    
    //update the vendor status
    public function updateStatus($id, $status){
        if(CommonHelpers::updateStatus('faqs', hashids_decode($id), 'status', $status, true)){
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
