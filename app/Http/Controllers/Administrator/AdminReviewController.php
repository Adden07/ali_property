<?php

namespace App\Http\Controllers\Administrator;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminReviewRequest;
use App\Models\AdminReview;
use App\Models\VendorPackage;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index(){
        $data = array(
            'title' => 'Review',
            'reviews'   => AdminReview::with(['package:id,title'])->latest()->get(),
        );
        return view('admin.review.index')->with($data);
    }

    public function add(){
        $data = array(
            'title'             => 'Add review',
            'vendor_packages'   => VendorPackage::where('status', 'active')->get(),
        );
        return view('admin.review.add')->with($data);
    }

    public function store(AdminReviewRequest $req){
        $validated = $req->validated();
        
        if(!is_null($validated['admin_review_id'])){
            $review = AdminReview::findOrFail(hashids_decode($validated['admin_review_id']));
            $msg    = 'Review updated successfully';
        }else{
            $review = new AdminReview();
            $msg    = 'Review added successfully';
        }

        $review->package_id = hashids_decode($req->package_id);
        $review->username   = $validated['username'];
        $review->review     = $validated['review'];
        $review->rating     = $validated['rating'];
        $review->save();

        return response()->json([
            'success'   => $msg,
            'redirect'  => route('admin.reviews.index')
        ]);
    }

    public function edit($id){
        $data = array(
            'title'             => 'Edit review',
            'edit_review'       => AdminReview::findOrFail(hashids_decode($id)),
            'vendor_packages'   => VendorPackage::where('status', 'active')->get(),
            'is_update'         => true
        );
        return view('admin.review.add')->with($data);
    }

    public function delete($id){
        AdminReview::destroy(hashids_decode($id));
        return response()->json([
            'success'   => 'Admin review deleted successfully',
            'reload'    => true
        ]);
    }
}
