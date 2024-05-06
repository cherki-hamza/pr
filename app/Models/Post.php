<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    const NOT_STARDET = 0;
    const IN_PROGRESS = 1;
    const PENDING_APPROVAL = 2;
    const APPROVAL = 3;
    const IMPROVEMENT = 4;
    const COMPLETED = 5;
    const REJECTED = 6;


    // relation betwenn post and task
    public function task(){
        return $this->belongsTo(Task::class);
    }

    // relation betwenn post and task
    public function user(){
        return $this->belongsTo(User::class);
    }

}
