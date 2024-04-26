<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;

class Site extends Model
{
    use HasFactory ,Favoriteable;

    protected $guarded = [];

    // the site hasMany Orders
    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class);
    }

    // custom method for search
    public function scopeSearch($query,$value)
    {
         $query::where('site_name', 'like', "%$value%")
               ->orWhere('site_url', 'like', "%$value%");

    }


}
