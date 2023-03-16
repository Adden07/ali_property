<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class PackageType extends Model
{
    use HasFactory, DianujHashidsTrait;
    
    protected $table = 'package_types';

    //local scopes
    public function scopeWhereStatus($query, $status){
        $query->where('status', $status);
    }

    public function vendorPackage(){
        return $this->hasMany(VendorPackage::class, 'pkg_type_id', 'id');
    }
}
