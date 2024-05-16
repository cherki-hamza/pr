<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientStatus extends Model
{
    use HasFactory;
    protected $guarded = [];


    // relation between ClientStatus and task
    public function task(){
        return $this->belongsTo(Task::class);
    }
}
