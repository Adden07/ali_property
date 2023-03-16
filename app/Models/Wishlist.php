<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class Wishlist extends Model
{
    use HasFactory, DianujHashidsTrait;

    protected $table = 'wishlists';

    public function package(){
        return $this->belongsTo(VendorPackage::class, 'package_id', 'id');
    }
}
