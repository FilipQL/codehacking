<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active', 'profile_photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getProfilePhotoPathAttribute()
    {
        return '/images/users/' . $this->profile_photo;
    }


    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function hasRole($r)
    {
        if (is_string($r)) {
            return $this->role->name == $r ? true : false;
        }
        elseif (is_object($r) && is_a($r, Role::class)) {
            return $this->role->name == $r->name ? true : false;
        } elseif (is_int($r)) {
            return $this->role->id == $r ? true : false;
        }

        return false;
    }

    public function isActive()
    {
        return $this->is_active == 1 ? true : false;
    }

}
