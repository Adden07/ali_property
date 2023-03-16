<?php

namespace App\Http\Controllers\Administrator;

use App\Helpers\CommonHelpers;
use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index(){
        $data = array(
            'title'     => 'Offers',
            'offers'    => Offer::latest()->get(),
        );
        return view('admin.offers.index')->with($data);
    }

    public function store(Request $req){
        $req->validate([
            'image' =>  ['required', 'mimes:jpg,jpeg,png', 'max:1080']
        ]);

        $offer = new Offer;
        $offer->image = CommonHelpers::uploadSingleFile($req->image, 'admin_uploads/offers/', 'jpg,jpeg,png', 1080);
        $offer->save();

        return response()->json([
            'success'   => 'Offer uploaded successfully',
            'reload'    => true
        ]);
    }

    //update the vendor status
    public function updateStatus($id, $status){
        if(CommonHelpers::updateStatus('offers', hashids_decode($id), 'status', $status, true)){
            return response()->json([
                'success'    => 'Status updated successfully',
                'reload'    => true
            ]);
        };
        return response()->json([
            'error' => 'Unable to update status'
        ]);
    }

    public function delete($id){
        $offer = Offer::findOrFail(hashids_decode($id));
        @unlink(public_path($offer->image));
        $offer->delete();

        return response()->json([
            'success'   => 'Offer deleted successfully',
            'reload'    => true
        ]);
    }
}
