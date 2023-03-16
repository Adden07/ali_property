<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class TravelTourBooking extends Model
{
    use HasFactory, DianujHashidsTrait;

    protected $table = 'travel_tours_bookings';

    protected $casts = [
        'add_ons'   => 'array'
    ];

    public function vendor_package(){
        return $this->belongsTo(VendorPackage::class, 'vendor_package_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
