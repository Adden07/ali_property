<?php

namespace App\Models;

use App\Traits\DianujHashidsTrait;
use Illuminate\Database\Eloquent\Model;

class PropertyDocument extends Model
{
    use DianujHashidsTrait;

    protected $table = 'properties_documents';

    protected $guarded = [];
    
    protected $appends = ['hashid'];

    public function property(){
        return $this->belongsTo('App\Property', 'property_id');
    }
}