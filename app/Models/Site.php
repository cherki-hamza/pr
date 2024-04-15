<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

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
