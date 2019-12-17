<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //relation manytomany avec category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    //relation manytomany avec user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
