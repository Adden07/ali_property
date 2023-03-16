<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class SoftwareService extends Model
{
    use HasFactory, DianujHashidsTrait;

    protected $table = 'software_services';

    public function scopeWhereStatus($query, $status){
        return $query->where('status', $status);
    }

}
