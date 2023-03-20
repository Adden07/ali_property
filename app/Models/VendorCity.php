<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class VendorCity extends Model
{
    use HasFactory, DianujHashidsTrait;

    protected $table = 'vendor_cities';

    public $timestamps = false;
}
