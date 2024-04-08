<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

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

}
