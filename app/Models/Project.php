<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    const GUEST_POSTING = 1;
    const DIGITAL_PR_SEO = 2;
    const PAID_ADS = 3;
    const DESIGN_VIDEO = 4;
    const CONTENT_WRITING = 5;

    // relationship between Project and User (the project belongsTo one user)
    public function user(){
        return $this->belongsTo(User::class);
    }

    // relation between project and task
    public function tasks(){
        return $this->hasMany(Task::class);
    }

}
