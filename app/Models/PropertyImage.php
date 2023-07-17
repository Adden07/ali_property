<?php

namespace App\Models;

use App\Traits\DianujHashidsTrait;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    use DianujHashidsTrait;

    protected $table = 'properties_images';

    protected $guarded = [];
    protected $appends = ['image_url', 'thumbnail_url', 'hashid'];

    public function property(){
        return $this->belongsTo('App\Property', 'property_id');
    }

    public function getImageUrlAttribute(){
        return asset($this->image);
    }

    public function getThumbnailUrlAttribute(){
        return asset($this->thumbnail);
    }
}