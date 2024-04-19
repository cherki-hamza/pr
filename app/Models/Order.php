<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    // the site hasMany Orders
    public function site(){
        return $this->belongsTo(Site::class);
    }

    // the order hasOne task
    public function task(){
        return $this->hasOne(Task::class);
    }
}
