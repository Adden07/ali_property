<?php

namespace App\Models;

use App\Permissions\HasPermissionsTrait;
use App\Traits\DianujHashidsTrait;
// use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable,  DianujHashidsTrait, HasPermissionsTrait;

    protected $guard = 'admin';

    protected $table = 'admins';

    protected $casts = [
        'user_permissions' => 'object',
    ];
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'email', 'password', 'firstname', 'lastname', 'mobile_no', 'image', 'usertype', 'is_verify'
    // ];
    protected $fillable = ['isp_id', 'name', 'username', 'password', 'email', 'nic', 'city_id', 'address'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute()
    {
        return (!empty($this->name)) ? ucwords($this->name) : ucwords($this->firstname . ' ' . $this->lastname);
    }



}
