<?php

namespace App;

use App\Traits\DianujHashidsTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyOffer extends Model
{
    use DianujHashidsTrait;

    protected $table = 'property_offers';

    protected $guarded = [];
    
    protected $appends = ['hashid'];
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function properties(){
        return $this->belongsTo('App\Property', 'property_id');
    }
 

 
}