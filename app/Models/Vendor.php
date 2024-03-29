<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Vendor extends Authenticatable
{
    use HasFactory, DianujHashidsTrait;

    protected $table = 'vendors';
    protected $guard = 'vendor';

    public function cities(){
        return $this->hasMany(VendorCity::class, 'vendor_id', 'id');
    }

    public function properties(){
        return $this->hasMany(Property::class, 'user_id', 'id');
    }    // public function packages(){
    //     return $this->hasMany(VendorPackage::class, 'vendor_id', 'id');
    // }

    // public function bookings(){
    //     return $this->hasManyThrough(TravelTourBooking::class, VendorPackage::class, 'vendor_id', 'vendor_package_id', 'id');

    // }

}
