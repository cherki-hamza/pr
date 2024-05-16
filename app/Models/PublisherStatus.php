<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublisherStatus extends Model
{
    use HasFactory;
    protected $guarded = [];

    // relation between PublisherStatus and task
    public function task(){
        return $this->belongsTo(Task::class);
    }

}
