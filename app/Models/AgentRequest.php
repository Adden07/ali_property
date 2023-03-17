<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\DianujHashidsTrait;

class AgentRequest extends Model
{
    use HasFactory, DianujHashidsTrait;

    protected $table = 'agent_requests';
}
