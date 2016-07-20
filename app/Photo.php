<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['user_id', 'file_name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPhotoPathAttribute()
    {
        return 'images/users/' . $this->file_name;
    }

}
