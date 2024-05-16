<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    protected $guarded = [];


    // relation betwenn note and post
    public function post(){
        return $this->belongsTo(Post::class);
    }

}
