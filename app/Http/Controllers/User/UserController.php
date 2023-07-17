<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\TravelTourBooking;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addWishList($package_id){//add package to wishlist
        $wishlist             = new Wishlist();
        $wishlist->user_id    = auth('web')->id();
        $wishlist->package_id = hashids_decode($package_id);
        $wishlist->save();

        return response()->json([
            'success'   => 'Package added to your wishlist',
            'reload'    => true
        ]);
    }

    public function dashboard(){
        $data = array(
            'title'             => 'Dashbaord',
            'bookings'          => [],
            'wishlists'         => [],
            // 'bookings'          => TravelTourBooking::where('user_id', auth('web')->id())->get(),
            // 'wishlists'          => Wishlist::with(['package'])->where('user_id', auth('web')->id())->get(),
            'account_details'   => auth('web')->user()
        );
        return view('user.dashboard')->with($data);
    }

    public function removeWishlist($id){
        if(Wishlist::destroy(hashids_decode($id))){
            return response()->json([
                'success'   => true
            ]);
        }
        return response()->json([
            'success'   => false
        ]);
    }   
}
