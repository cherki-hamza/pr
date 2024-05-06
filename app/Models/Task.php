<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
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


    // relation between user and task
    public function user(){
        return $this->belongsTo(User::class);
    }

    // relation between user and project the task belongs to project
    public function project(){
        return $this->belongsTo(Project::class);
    }

    // relation betwenn task and order
    public function order(){
        return $this->belongsTo(Order::class);
    }

    // relation betwenn task and order
    public function site(){
        return $this->belongsTo(Site::class);
    }

    // method for get tasks by project
    public function Tasks_by_project($project_id=null){
        return $this->belongsTo(Project::class)->where('project_id',$project_id);
    }

    // relation betwenn task and post
    public function post(){
        return $this->hasOne(Post::class);
    }

    // method for return the name of status
    public function show_status(){
        if($this->status == 1){
            return 'IN PROGRESS';
        }elseif($this->status == 2){
            return 'PENDING APPROVAL';
        }elseif($this->status == 3){
            return 'approval';
        }elseif($this->status == 4){
            return 'Need IMPROVEMENT';
        }elseif($this->status == 5){
            return 'COMPLETED';
        }elseif($this->status == 6){
            return 'REJECTED';
        }else{
            return 'NOT STARTED';
        }
    }


    // method for return the status style
    public function show_status_style(){
        if($this->status == 1){
            return 'info';
        }elseif($this->status == 2){
            return 'warning';
        }elseif($this->status == 3){
            return 'warning';
        }elseif($this->status == 4){
            return 'info';
        }elseif($this->status == 5){
            return 'success';
        }elseif($this->status == 6){
            return 'danger';
        }else{
            return 'secondary';
        }
    }

    // method for return the content type
    public function task_type(){
        if($this->task_type == 'c_p'){
            return 'Content Placement';
        }else{
            return 'Content Creation And Placement';
        }
    }


}


