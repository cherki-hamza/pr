<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;
use Illuminate\Notifications\Notification;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles,Favoriteability;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'google_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relation betwenn user and profile
    public function profile(){
        return $this->hasOne(Profile::class);
    }

    // get photo from site api by email
    public function GetGravatar(){
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "http://gravatar.com/avatar/$hash";
    }

    // get picture from database ==> from profile model
    public function GetPicture(){


        if ($this->profile->picture != null){
            if (str_contains($this->profile->picture, 'gravatar.com')){
                return $this->profile->picture;
            }
        }

        if ($this->profile->picture != null){
            if (!str_contains($this->profile->picture, 'gravatar.com')){
                return asset('/public'.$this->profile->picture);
            }
        }

    }

    // check if user Profile has a picture in database ==> true : see the user profile has a picture | and false see the user dont have a picture in database
    public function hasPicture(){
        if ($this->profile->picture != null){
            return true;
        }else{
            return false;
        }
    }

    // relationship between User and Project (the user can hase one or multiple projects)
    public function projects(){
        return $this->hasMany(Project::class);
    }


    // relationship between User and Category (the user can hase one or multiple Category)
    public function categories(){
        return $this->hasMany(Category::class);
    }


    // relationship between User and Task (the user can hase one or multiple Tasks)
    public function tasks(){
        return $this->hasMany(Task::class);
    }

    // tasks not started
    public function tasks_not_started($site_id=null){
        return $this->hasMany(Task::class)->where('status',Task::NOT_STARDET)->where('site_id',$site_id);
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

    // relashion between user and ayement
    public function payments(){
        return $this->hasMany(Payment::class);
    }

    //************************************* */

    // tasks NOT_STARDET
    public function tasks_not_started_projects($site_id=null){
        return $this->hasMany(Task::class)->where('status',Task::NOT_STARDET);
    }

    // tasks IN_PROGRESS
    public function tasks_in_progress_projects($site_id=null){
        return $this->hasMany(Task::class)->where('status',Task::IN_PROGRESS);
    }

    // tasks PENDING_APPROVAL
    public function tasks_pending_approval_projects($site_id=null){
        return $this->hasMany(Task::class)->where('status',Task::PENDING_APPROVAL);
    }

    // tasks PENDING_APPROVAL
    public function publisher_tasks_pending_approval_projects($site_id=null){
        return $this->hasMany(Task::class)->where('status',Task::PUBLISHER_APPROVAL);
    }

    // tasks IMPROVEMENT
    public function tasks_improvment_projects($site_id=null){
        return $this->hasMany(Task::class)->where('status',Task::IMPROVEMENT);
    }

    // tasks COMPLETED
    public function tasks_completed_projects($site_id=null){
        return $this->hasMany(Task::class)->where('status',Task::COMPLETED);
    }

    // tasks REJECTED
    public function tasks_rejected_projects($site_id=null){
        return $this->hasMany(Task::class)->where('status',Task::REJECTED);
    }

    // method for check if is super admin
    public function super(){
        return ($this->role == 'superadmin')? true : false;
    }

    // method for check if is client
    public function client(){
        return ($this->role == 'client')? true : false;
    }

    // method for check if is admin
    public function admin(){
        return ($this->role == 'admin')? true : false;
    }

    // method for check if is publisher
    public function publisher(){
        return ($this->role == 'publisher')? true : false;
    }

        /**
     * Route notifications for the Vonage channel.
     */
    public function routeNotificationForVonage(Notification $notification): string
    {
        return $this->mobile;
    }

    public function RoleIsSuperAdmin(){
       return (auth()->user()->role == 'super-admin')? true : false;
    }

    public function RoleIsClient(){
        return (auth()->user()->role == 'client')? true : false;
    }

    public function TypeIsPublisher(){
        return (auth()->user()->type == 'publisher')? true : false;
    }

    public function TypeIsUser(){
        return (auth()->user()->type == 'user')? true : false;
    }

}
