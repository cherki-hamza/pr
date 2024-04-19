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
    const IMPROVEMENT = 3;
    const COMPLETED = 4;
    const REJECTED = 5;


}
