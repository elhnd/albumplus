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

    /**
     * Scope a query eager load users and order query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatestWithUser($query)
    {
        $user = auth()->user();
        if($user && $user->adult) {
            return $query->with ('user')->latest ();
        }
        return $query->with ('user')->whereAdult(false)->latest ();
    }
}
