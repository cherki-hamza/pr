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

    // tasks not started
    public function tasks_not_started(){
        return $this->hasMany(Task::class)->where('status',Task::NOT_STARDET);
    }

    // tasks in progress
    public function tasks_in_progress(){
        return $this->hasMany(Task::class)->where('status',Task::IN_PROGRESS);
    }

    // tasks pending approval
    public function tasks_pending_approval(){
        return $this->hasMany(Task::class)->where('status',Task::PENDING_APPROVAL);
    }

    // tasks improvement
    public function tasks_improvement(){
        return $this->hasMany(Task::class)->where('status',Task::IMPROVEMENT);
    }

    // tasks completed
    public function tasks_completed(){
        return $this->hasMany(Task::class)->where('status',Task::COMPLETED);
    }

    // tasks rejected
    public function tasks_rejected(){
        return $this->hasMany(Task::class)->where('status',Task::REJECTED);
    }

    public function site(){
        return $this->belongsTo(Site::class);
    }

}
