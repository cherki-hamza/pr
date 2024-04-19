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
    const IMPROVEMENT = 3;
    const COMPLETED = 4;
    const REJECTED = 5;


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

    // method for return the name of status
    public function show_status(){
        if($this->status == 1){
            return 'IN PROGRESS';
        }elseif($this->status == 2){
            return 'PENDING APPROVAL';
        }elseif($this->status == 3){
            return 'IMPROVEMENT';
        }elseif($this->status == 4){
            return 'COMPLETED';
        }elseif($this->status == 5){
            return 'REJECTED';
        }else{
            return 'NOT STARTED';
        }
    }
}


