<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class PackageAddOn extends Model
{
    use HasFactory, DianujHashidsTrait;

    protected $table = 'package_add_ons';
}
