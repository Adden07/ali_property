<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class AffiliatePartnership extends Model
{
    use HasFactory, DianujHashidsTrait;

    protected $table = 'affiliate_partnerships';
}
