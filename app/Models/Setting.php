<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class Setting extends Model
{
    use HasFactory, DianujHashidsTrait;

    protected $table = 'settings';

    protected $casts = [
        'data'  => 'array'
    ];

    protected $fillable = array('type', 'data');
}
