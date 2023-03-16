<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class VendorPackage extends Model
{
    use HasFactory, DianujHashidsTrait;

    public function vendor(){
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }

    public function package_type(){
        return $this->belongsTo(PackageType::class, 'pkg_type_id', 'id');
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

    //local scopes
    public function scopeWhereStatus($query, $status){
        $query->where('status', $status);
    }

    public function addOns(){
        return $this->hasMany(PackageAddOn::class, 'package_id', 'id');
    }

    public function packageImages(){
        return $this->hasMany(VendorPackageImage::class, 'vendor_package_id', 'id');
    }
    
    public function adminReviews(){
        return $this->hasMany(AdminReview::class, 'package_id', 'id');
    }

    public function bookings(){
        return $this->hasMany(TravelTourBooking::class, 'vendor_package_id', 'id');
    }
}
