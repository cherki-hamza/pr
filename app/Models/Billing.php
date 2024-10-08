<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relation between user aand billing
    public function user(){
        return $this->belongsTo(User::class);
    }
}
