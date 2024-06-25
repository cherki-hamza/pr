<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;

class Site extends Model
{
    use HasFactory ,Favoriteable;

    protected $guarded = [];

    // the site hasMany Orders
    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function publishers()
    {
        return $this->belongsToMany(Publisher::class);
    }

    // custom method for search
    public function scopeSearch($query,$value)
    {
         $query::where('site_name', 'like', "%$value%")
               ->orWhere('site_url', 'like', "%$value%");

    }

    // method for handl the category return from database
    public function handle_category(){
        if(!empty($this->site_category)){

            if($this->site_category == '-'){
                 return 'No Category';
            }else{
                 return $this->site_category;
            }

        }else{
            return 'No Category';
        }

    }


    // method for handl the country : site_region_location return from database
    public function handle_country(){
        if(!empty($this->site_region_location)){

            if($this->site_region_location == '-'){
                 return 'All';
            }else{
                 return $this->site_region_location;
            }

        }else{
            return 'All';
        }

    }


    // method for handl the monthly_traffic : site_monthly_traffic return from database
    public function handle_monthly_traffic(){
        if(!empty($this->site_monthly_traffic)){

            if($this->site_monthly_traffic == '-'){
                 return 'Not Defined';
            }else{
                 return $this->site_monthly_traffic;
            }

        }else{
            return 'Not Defined';
        }

    }

    // method for get all site tasks
    /* public static function tasks($site_url = null){
        return Task::where('site_id' , $site_url)->get() ?? [];
    } */

    // site hasMant tasks
    public function tasks(){
      return $this->hasMany(Task::class);
    }

    // site count
    public function tasks_count(){
        return $this->hasMany(Task::class)->count();
      }


       // site count by p_status = 1
       public function tasks_count_by_site($site_id){
        return $this->hasMany(Task::class)
                   ->where('admin_status' , 1)
                   ->where('pr_site_id' , $site_id)
                   ->count();
    }


}
