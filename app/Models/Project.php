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
    public function tasks_not_started($type=null){
        return $this->hasMany(Task::class)->where('task_type',$type)->where('status',Task::NOT_STARDET);
    }

    // tasks in progress
    public function tasks_in_progress($type=null){
        return $this->hasMany(Task::class)->where('task_type',$type)->where('status',Task::IN_PROGRESS);
    }

    // tasks pending approval
    public function tasks_pending_approval($type=null){
        return $this->hasMany(Task::class)->where('task_type',$type)->where('status',Task::PENDING_APPROVAL);
    }

    // tasks improvement
    public function tasks_improvement($type=null){
        return $this->hasMany(Task::class)->where('task_type',$type)->where('status',Task::IMPROVEMENT);
    }

    // tasks waiting Publisher for Approve
    public function tasks_publisher_approve($type=null){
        return $this->hasMany(Task::class)->where('task_type',$type)->where('status',Task::PUBLISHER_APPROVAL);
    }

    // tasks completed
    public function tasks_completed($type=null){
        return $this->hasMany(Task::class)->where('task_type',$type)->where('status',Task::COMPLETED);
    }

    // tasks rejected
    public function tasks_rejected($type=null){
        return $this->hasMany(Task::class)->where('task_type',$type)->where('status',Task::REJECTED);
    }

    public function site(){
        return $this->belongsTo(Site::class);
    }

}
