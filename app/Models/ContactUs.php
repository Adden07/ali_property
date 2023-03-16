<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class ContactUs extends Model
{
    use HasFactory, DianujHashidsTrait;

    protected $table = 'contact_us';
}
