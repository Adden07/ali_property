<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class VendorPackageImage extends Model
{
    use HasFactory, DianujHashidsTrait;

    protected $table   = 'vendor_package_images';
    public $timestamps = false;
}
