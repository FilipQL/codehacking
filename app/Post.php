<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['user_id', 'category_id', 'title', 'body', 'post_image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }



    public function getPostImagePathAttribute()
    {
        if ($this->post_image) {
            return 'images/posts/' . $this->post_image;
        }
        return '';
    }
}
