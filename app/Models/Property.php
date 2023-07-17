<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class Property extends Model
{
    use HasFactory, DianujHashidsTrait;

    protected $table = 'properties';

    public function city(){
        return $this->belongsTo(VendorCity::class, 'city_id', 'id');
    }

    public function images(){
        return $this->hasMany(PropertyImage::class, 'property_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function thumbnail(){
        return $this->hasOne('App\Models\PropertyImage', 'property_id')->oldest();
    }

    public function documents(){
        return $this->hasMany('App\Models\PropertyDocument', 'property_id');
    }
}
