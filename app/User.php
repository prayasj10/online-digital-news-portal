<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use Notifiable,LogsActivity;

    protected static $logAttributes = ['name','email','image','status','role_id'];
    /**
     * The attributes that are mass assignable.
     *root
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image','status','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function hasPermission($name)
    {
        return $this->role->permissions()->where('name',$name)->exists();
    }
}
