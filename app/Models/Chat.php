<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $guarded = [];  

    public function chatDetails(){
        return $this->hasMany(ChatDetail::class, 'chat_id', 'chat_id');
    }
}
